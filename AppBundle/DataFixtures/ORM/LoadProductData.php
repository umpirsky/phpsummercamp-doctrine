<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductData implements FixtureInterface
{
    private $products = [
        'Borgonja',
        'Cabernet Franc',
        'Cabernet Sauvignon',
        'Chardonnay',
        'Malvazija',
        'Alba',
        'Merlot',
        'Rose Violetta',
        'Pinot Sivi',
        'Teran',
        'Ponente',
    ];

    public function load(ObjectManager $manager)
    {
        foreach ($this->products as $name) {
            $product = new Product();

            $product
                ->setName($name)
                ->setPrice(rand(9, 999))
                ->setDescription($name)
            ;

            $manager->persist($product);
        }

        $manager->flush();
    }
}
