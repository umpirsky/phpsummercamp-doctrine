<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/product")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('AppBundle:Product')
            ->findAllProducts()
        ;

        return $this->render(
            'Product/index.html.twig',
            ['products' => $products]
        );
    }

    /**
     * @Route("/product/category/{category}")
     */
    public function categoryAction($category)
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('AppBundle:Product')
            ->findAllProductsByCategory($category)
        ;

        return $this->render(
            'Product/index.html.twig',
            ['products' => $products]
        );
    }

    /**
     * @Route("/product/create")
     */
    public function createAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $product = new Product();
            $product->setName($request->request->get('name'));
            $product->setPrice($request->request->get('price'));
            $product->setDescription($request->request->get('description'));

            $category = new Category();
            $category->setName($request->request->get('category'));
            $product->setCategory($category);

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush($product);

            return $this->redirect('/product');
        }

        return $this->render('Product/create.html.twig');
    }
}
