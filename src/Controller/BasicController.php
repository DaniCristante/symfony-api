<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/")
 */
class BasicController extends AbstractController
{
    /**
     * @Route("basic", name="basic", METHODS={"GET"})
     */
    public function test(): JsonResponse
    {
        return new JsonResponse([
            'status' => 'Hola!' 
        ]);
    }
}
