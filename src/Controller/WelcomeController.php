<?php

// http://127.0.0.1:8000/babou/Boubou
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; /* Ajouter ce use pour pouvoir extends AbstractController" */


// On va créer une route.
class WelcomeController extends AbstractController /* Pour hériter de "toutes les méthodes de extends AbstractController" */
{
    /**
     * @Route("/babou/{nomRoute}", name="babou")
     */
    public function babou($nomRoute){  
            /* public function babou($nomRoute) 
            rend le paramètre $nomRoute obligatoire.
            ($nomRoute = 'Paramètre par défault')
            donne un paramètre à $nomRoute au cas où.*/


        // On peut dumper une variable comme var_dump
        dump($nomRoute);
        // Rendu de fichier twig pour voir:
        // \vendor\symfony\framework-bundle\Controller\ControllerTrait.php
        return $this->render('welcome/babou.html.twig', [
            'name' => ucfirst($nomRoute) /* ucfirst Majuscule la première lettre */
        ]);
    }
}