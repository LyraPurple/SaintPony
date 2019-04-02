<?php

// http://127.0.0.1:8000/babou
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; /* Ajouter ce use pour pouvoir extends AbstractController" */


// On va créer une route.
class WelcomeController extends AbstractController /* Pour hériter de "toutes les méthodes de extends AbstractController" */
{
    /**
     * @Route("/babou", name="babou")
     */
    public function babou(){
        $name = 'Boubi';
        // On peut dumper une variable comme var_dump
        dump($name);
        // Rendu de fichier twig pour voir:
        return $this->render('welcome/babou.html.twig', [
            'name' => $name
        ]);
    }
}