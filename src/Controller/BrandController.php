<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Brand;
use Doctrine\Persistence\ManagerRegistry;

class BrandController extends AbstractController
{
    #[Route('/brands', name: 'brands')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Brand::class);
        $brands = $repository->findAll();

        dump($brands);
        die();
        
        $response = new Response(json_encode($brands));
        
        return $response;
    }

    #[Route('/brand/create', name: 'brand-create')]
    public function createBrand(ManagerRegistry $doctrine): Response {
        $entityManager = $doctrine->getManager(); //Получаем менеджер БД - Entity Manager
        //Создаем экземпляр модели $brand = new Brand();
        $brand = new Brand();
        //Задаем значение полей $brand->setValue('value'); ...
        $brand->setName('Mouse Home');
        $brand->setDescription('Ergonomic and stylish mouse!');
        $entityManager->persist($brand); //Передаем менеджеру объект модели $em->persist($brand)
        //Добавляем запись в таблицу $em->flush();
        $entityManager->flush();
        return new Response('Saved new brand with id ' . $brand->getId());
    }

    /**
     * @Route("/brand/{id}", name="brand-show")
     */
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $brand = $doctrine->getRepository(Brand::class)->find($id);

        if (!$brand) {
            throw $this->createNotFoundException(
                'No brand found for id '.$id
            );
        }

        $product = $brand->getProducts();

        // prints "Doctrine\ORM\PersistentCollection"
        dump(get_class($product));

        dump($brand);
        die();

        return new Response('Check out this great brand: '.$brand->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }


    /**
     * @Route("/branda/{id}", name="product_show")
     */
    public function show1(int $id, BrandRepository $brandRepository): Response
    {
        $product = $brandRepository
            ->find($id);

        // ...
    }

    /**
     * @Route("/product/edit/{id}")
     */
    public function update(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }
}
