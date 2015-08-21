<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadProductData extends AbstractFixture
{
    private $products = [
        'Borgonja' => 'Red',
        'Cabernet Franc' => 'Red',
        'Cabernet Sauvignon' => 'Red',
        'Chardonnay' => 'White',
        'Malvazija' => 'White',
        'Alba' => 'White',
        'Merlot' => 'White',
        'Rose Violetta' => 'Red',
        'Pinot Sivi' => 'White',
        'Teran' => 'Red',
        'Ponente' => 'White',
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        foreach ($this->products as $name => $category) {
            $product = new Product();

            $product
                ->setName($name)
                ->setPrice(rand(9, 999))
                ->setDescription($faker->text)
                ->setCategory($this->getReference($category))
            ;

            $manager->persist($product);
        }

        $manager->flush();
    }
}
