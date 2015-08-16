<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAllProducts()
    {
        return $this
            ->createQueryBuilder('product')
            ->select('product', 'category')
            ->leftJoin('product.category', 'category')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllProductsByCategory($categoryName)
    {
        return $this
            ->createQueryBuilder('product')
            ->select('product', 'category')
            ->leftJoin('product.category', 'category')
            ->where('category.name = :name')
            ->setParameter('name', $categoryName)
            ->getQuery()
            ->getResult()
        ;
    }
}
