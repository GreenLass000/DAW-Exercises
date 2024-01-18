<?php // src/Controller/Ejemplo1.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Ejemplo1 extends AbstractController
{
    #[Route('/hola', name: 'hola')]
    public function NombreFuncion(): Response
    {
        return new Response('<html lang="es"><body>Patata</body></html>');
    }

    #[Route("/producto/{num1?2}/{num2?4}", name: 'producto')]
    public function producto($num1, $num2): Response
    {
        $producto = $num1 * $num2;
        return new Response($producto);
    }
}