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
        return $this->getEntityManager()
            ->createQuery('SELECT product, category
                FROM AppBundle:Product product
                LEFT JOIN product.category category
                WHERE category.name = :name
            ')
            ->setParameter('name', $categoryName)
            ->getResult()
        ;
    }
}
