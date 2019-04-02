<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
/* Ajouter une route en un seul fichier 
(Méthode aussi efficace que yaml, 
il y en a pour tout les goûts.) 
Installer 
*******************************
composer require annotations
*******************************
*/
use Symfony\Component\Routing\Annotation\Route;


// On va créer une route.
class WelcomeController
{
    /**
     * @Route("/babou", name="babou")
     */
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