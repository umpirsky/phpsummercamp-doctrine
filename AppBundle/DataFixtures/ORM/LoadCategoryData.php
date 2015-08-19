<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        foreach (['White', 'Red'] as $name) {
            $category = new Category();

            $category
                ->setName($name)
            ;

            $manager->persist($category);

            $this->setReference($name, $category);
        }

        $manager->flush();
    }
}
