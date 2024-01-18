<?php // src/Controller/Ejemplo2.php //Y se comprueba accediendo a “localhost:8000/hola2”:

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Clock\Clock;
use Symfony\Component\Clock\MockClock;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Ejemplo2 extends AbstractController
{
    #[Route('/hola2', name: 'hola2')] public function NombreFuncion(): Response
    {
        Clock::set(new MockClock()); //Configuración del reloj, no es obligatorio, pero si más rápido
        $clock = Clock::get(); //Instanciamos un reloj
        //$clock->withTimeZone('Europe/Madrid'); //Podemos marcar la zona
        $now = $clock->now(); //Cogemos la hora actual
        $dia = $now->format('h:i:s'); //La guardamos en una variable
        $clock->sleep(2.5); //Espera de 2,5 segundos
        $now = $clock->now(); // Volvemos a coger la hora actual
        $dia = $dia . "->" . $now->format('h:i:s'); //Añadimos a la variable la nueva hora
        return new Response("<html><body>$dia</body></html>");
    }
}