<?php

namespace App\Controller;

use App\Model\PostEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/nullable/{postEnum}')]
    public function enumRouteNullable(?PostEnum $postEnum = null): Response
    {
        // works
        return $this->render('home/enumRoute.html.twig', ['enum' => $postEnum]);
    }

    #[Route('/default/{postEnum}')]
    public function enumRouteDefault(PostEnum $postEnum = PostEnum::VLOG): Response
    {
        // doesn't compile, `Symfony\Component\Routing\Route cannot contain objects.`
        return $this->render('home/enumRoute.html.twig', ['enum' => $postEnum]);
    }

    #[Route('/default/{postEnum}', defaults: ['postEnum' => PostEnum::VLOG->value])]
    public function enumRouteDefaultString(PostEnum $postEnum): Response
    {
        // works
        return $this->render('home/enumRoute.html.twig', ['enum' => $postEnum]);
    }
}
