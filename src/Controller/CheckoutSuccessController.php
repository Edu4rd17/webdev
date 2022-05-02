<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutSuccessController extends AbstractController
{
    #[Route('/checkoutSuccess', name: 'app_checkout_success')]
    public function index(): Response
    {
        return $this->render('checkout_success/index.html.twig', [
            'controller_name' => 'CheckoutSuccessController',
        ]);
    }
}
