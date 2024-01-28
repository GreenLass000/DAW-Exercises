<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Provincia;

#[Route("/provincia", name: "/provincia")]
class ProvinciaController extends AbstractController
{
    #[Route("/insertform", name: "/insert")]
    public function new_form(Request $request): Response
    {
        $f = $this->createFormBuilder();
        $f->add("denominacion", TextType::class, ["label" => "denominacion", "attr" => ["value" => "patata"]]);
        $f->add("extension", TextType::class);
        $f->add('Enviar', SubmitType::class, array('label' => 'Saludar'));

        $form = $f->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datos = $form->getData();
            $den = $datos["denominacion"];
            $ext = $datos["extension"];

            return new Response("<html><body>Denominacion: $den; Extension: $ext</body></html>");
        }
        return $this->render("formProvincia.html.twig", array("form" => $form->createView()));
    }
}