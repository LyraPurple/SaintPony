<?php

/*  
******************************** 
On retourne au début du document*/
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
/* 
Pour ajoutay notre namespace et notre use  
********************************
*/

// On va créer une route.
class WelcomeController
{
    public function babou(){
        $name = 'Boubi';
        // Ce sera une route, et chaque route (chaque page) 
        // doit renvoyer quelque chose. RETURN
        return
        // On utilise une classe Response
        // du nameSpace de Symfony, donc on doit ajouter le use.
        new Response('<html><body>La rouroute '.$name.'</body></html>');
    }
}

/* Enfin: /Symfony_by_me/discover-symfony/config/routes.yaml
plop:
  path: /babou
  controller: App\Controller\WelcomeController::babou
      # Allez voire: http://localhost:8000/babou */

//  🚨 Méthode Yaml🚨