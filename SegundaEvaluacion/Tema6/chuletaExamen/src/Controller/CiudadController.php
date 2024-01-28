<?php

namespace App\Controller;

use App\Entity\Provincia;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route("/ciudad", name: "/ciudad")]
class CiudadController extends AbstractController
{
    #[Route("/insertform", name: "/insert")]
    public function new_form(Request $request, ManagerRegistry $managerRegistry)
    {
        $provincias = $managerRegistry
            ->getManagerForClass(Provincia::class)
            ->getRepository(Provincia::class)
            ->findAll();

        $provs = [];
        foreach ($provincias as $provincia) {
            $provs[$provincia->getExtension()] = $provincia->getDenominacion();
        }

        $f = $this->createFormBuilder();
        $f->add("nombre", TextType::class);
        $f->add("poblacion", NumberType::class);
        $f->add("provincia", ChoiceType::class, [
            "choices" => $provs
        ]);
        $f->add('Enviar', SubmitType::class, array('label' => 'Saludar'));

        $form = $f->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datos = $form->getData();
            $name = $datos["nombre"];
            $pob = $datos["poblacion"];
            $prov = $datos["provincia"];

            return new Response("<html><body>Nombre: $name; Poblacion: $pob; Pronvincia: $prov</body></html>");
        }
        return $this->render("formCiudad.html.twig", array("form" => $form->createView()));
    }


    #[Route('/insertar', name: '/insertar')]
    public function insertarFormulario(Request $request, ManagerRegistry $managerRegistry)
    {
        /*
        $objectManager = $managerRegistry->getManagerForClass(Provincia::class);
        $repository = $objectManager->getRepository(Provincia::class);
        $provincias = $repository->findAll();
        */
        $provincias = $this->getProvincias($managerRegistry);
        $arrayProvincias = [];
        foreach ($provincias as $provincia) {
            $arrayProvincias[$provincia->getExtension()] = $provincia->getDenominacion();
        }

        $f = $this->createFormBuilder();
        $f->add('nombre', TextType::class);
        $f->add('poblacion', NumberType::class);
        $f->add('provincia', ChoiceType::class, [
            "choices" => $arrayProvincias
        ]);
        $f->add("Enviar", SubmitType::class, array('label' => 'Saludar'));
        $form = $f->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $datos = $form->getData();
            $nombre = $datos["nombre"];
            $poblacion = $datos["poblacion"];
            $provincia = $datos["provincia"];

            return new Response("nombre: " . $nombre . "-poblacion: " . $poblacion . "-provincia:" . $provincia);
        }
        return $this->render('formCiudad.html.twig', array("form" => $form->createView()));
    }

    function getProvincias(ManagerRegistry $managerRegistry)
    {
        $objectManager = $managerRegistry->getManagerForClass(Provincia::class);
        $repository = $objectManager->getRepository(Provincia::class);
        $provincias = $repository->findAll();

        return $provincias;
    }

}