<?php

namespace App\DataFixtures;

use App\Factory\BrandFactory;
use App\Factory\ProductFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        BrandFactory::createMany(10);
        ProductFactory::createMany(50, function (){
            return [
                'brand' => BrandFactory::random()
            ];
        });
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
