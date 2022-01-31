<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Product::class);
        $products = $repository->findAll();

        dump($products);
        die();

        $response = new Response(json_encode($products));

        return $response;
//        return $this->render('product/index.html.twig', [
//            'controller_name' => 'ProductController',
//        ]);
    }

    //Fetching Related Objects
    //When you need to fetch associated objects, your workflow looks like it did before. First, fetch a $product object and then access its related Category object:
    //

    // Получение связанных объектов
    // Когда вам нужно получить связанные объекты, ваш рабочий процесс выглядит так же, как и раньше. Сначала выберите объект $ product, а затем получите доступ к связанному с ним объекту Brand:
    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(int $id, ProductRepository $productRepository): Response
    {
        $product = $productRepository
            ->find($id);
        $brand = $product->getBrand()->getName();
        dump($product, $brand);
        die();

        $response = new Response(json_encode($product));

        return $response;
    }
}


