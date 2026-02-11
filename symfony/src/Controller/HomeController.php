<?php

namespace App\Controller;

use App\Service\YugiohApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(YugiohApiService $yugiohApiService): Response
    {
        $datas = $yugiohApiService->getSet();
        //dd($datas);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'datas' => $datas,
        ]);
    }
}
