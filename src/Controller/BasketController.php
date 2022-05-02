<?php

namespace App\Controller;

use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    #[Route('/basket', name: 'app_basket')]
    public function index(): Response
    {
        $totalPrice = $this->addTotalPrice();
        $template = 'basket/index.html.twig';
        $args = [];
        $session = $this->requestStack->getSession();
        if ($session->has('basket')) {
            $products = $session->get('basket');
        }
//        var_dump($products);
        return $this->render($template, $args);

    }

    //empty the basket
    #[Route('/emptyBasket', name: 'empty_basket')]
    public function empty(): Response
    {
        $session = $this->requestStack->getSession();
        $session->remove('basket');
        return $this->redirectToRoute('default');
    }

    //add products into the basket
    #[Route('/add/{id}', name: 'add_basket')]
    public function addToBasket(Product $product)
    {
        //default - a new empty array
        $products = [];

        //if the products array is in session, retrieve and store in $products
        $session = $this->requestStack->getSession();
        if ($session->has('basket')) {
            $products = $session->get('basket');
        }

        //get the id of the product
        $id = $product->getId();

        //only add to the array if its not there already
        if (!array_key_exists($id, $products)) {

            //append $product to our list
            $products[$id] = $product;

            //store the updated array back into the session
            $session->set('basket', $products);
        }

        //redirect even if changes or not
        return $this->redirectToRoute('app_basket');
    }

    public function addTotalPrice()
    {
        $itemsHolder = [];
        $totalPrice = 0;

        $session = $this->requestStack->getSession();
        if ($session->has('basket')) {
            $sumTotal = $session->get('basket');
            foreach ($sumTotal as $itemsHolder) {
                $totalPrice += $itemsHolder->getProductPrice();
            }
        }
        return $totalPrice;
    }

    #[Route('/delete/{id}', name: 'basket_delete')]
    public function deleteBasketItem(int $id): Response
    {
        //default - new empty array
        $products = [];

        // if 'products' array in session, retrieve and store in $products
        $session = $this->requestStack->getSession();

        if ($session->has('basket')) {
            $products = $session->get('basket');
        }

        //only attempt to remove if item is in the array
        if (array_key_exists($id, $products)) {
            //remove entry with $id
            unset($products[$id]);

            if (sizeof($products) < 1) {
                return $this->redirectToRoute('empty_basket');
            }

            //store the updated array back into the session
            $session->set('basket', $products);
        }
        return $this->redirectToRoute('app_basket');
    }

}
