<?php

// http://127.0.0.1:8000/babou/*
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; /* Ajouter ce use pour pouvoir extends AbstractController" */


// On va créer une route.
class WelcomeController extends AbstractController /* Pour hériter de "toutes les méthodes de extends AbstractController" */
{
    /**
     * @Route("/babou/{nomRoute}", name="babou", requirements={"^[a-z]{3,8}$"})
     */
    // Symfony de base fait: ^$ 
    // donc {"^[a-z]{3,8}$"} = {"[a-z]{3,8}"}
    // Dans nos Regex https://regex101.com/

    public function babou($nomRoute = 'Boubou'){  
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


/* *****************
Ne pas écrire les liens ne dur, les écrires ainsi:
 *****************
$url = $this->generateUrl('product_show', [
    'slug' => 'Poupipo'
    ]);
 *****************
Celà permet au site de gérer les liens générés selon les langues (par exemple) */