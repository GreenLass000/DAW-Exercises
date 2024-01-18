<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Ejercicio extends AbstractController
{
    #[Route('/result/{cuadrado?1}', name: 'cuadrado')]
    public function calcCuadrado($cuadrado): Response
    {
        if (preg_match("/^-?\d+$/", $cuadrado)) {
            if (preg_match("/^-\d+$/", $cuadrado)) {
                return new Response("<html lang='es'><body>El numero no puede ser negativo</body></html>");
            }
            return new Response("<html lang='es'><body>No se puede operar con cadenas de texto</body></html>");
        }

        $cc = $cuadrado * $cuadrado;
        $ccc = $cuadrado * $cuadrado * $cuadrado;

        return new Response("<html lang='es'><body>El cuadrado de $cuadrado es: $cc <br>
                                    El cubo de $cuadrado es: $ccc </body></html>");
    }
}