<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class TestController extends AbstractController
{
    #[Route('/')]
    public function sayHi(Request $request): Response
    {
        $recepient = $request->get('name') ?? 'unknown person!';

        return new JsonResponse([
            'success' => true,
            'message' => 'Hi ' . $recepient
        ]);
    }
}
