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
        $data = $yugiohApiService->getSet('2-Player Starter Deck: Yuya & Declan');
        dd($data);
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'data' => $data,
        ]);
    }
}
