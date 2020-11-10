<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BasicController extends AbstractController
{
    /**
     * @Route("/basic", name="basic")
     */
    public function test(): JsonResponse
    {
        return new JsonResponse([
            'status' => 'Hola!' 
        ], 200);
    }
}
