<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StringController extends AbstractController
{
    #[Route('/string/nullable/{postEnum}')]
    public function enumRouteNullable(?string $postEnum = null): Response
    {
        // works
        return $this->render('home/enumRoute.html.twig', ['enum' => $postEnum]);
    }

    #[Route('/string/defaultPhp/{postEnum}')]
    public function enumRouteDefault(string $postEnum = 'vlog'): Response
    {
        // doesn't compile, `Symfony\Component\Routing\Route cannot contain objects.`
        return $this->render('home/enumRoute.html.twig', ['enum' => $postEnum]);
    }

    #[Route('/string/defaultRoute/{postEnum}', defaults: ['postEnum' => 'vlog'])]
    public function enumRouteDefaultString(string $postEnum): Response
    {
        // works
        return $this->render('home/enumRoute.html.twig', ['enum' => $postEnum]);
    }
}
