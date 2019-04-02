<?php

/*  
******************************** 
On retourne au début du document*/
namespace Controller;
use Symfony\Component\HttpFoundation\Response;
/* 
Pour ajoutay nos namespace et notre use  
********************************
*/

// On va créer une route.
class WelcomeController
{
    public function hello(){
        // Ce sera une route, et chaque route (chaque page) 
        // doit renvoyer quelque chose. RETURN
        return
        // On utilise une classe Response
        // du nameSpace de Symfony, donc on doit ajouter le use.
        new Response('La rouroute');
    }
}