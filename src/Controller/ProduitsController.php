<?php
 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/*  https://github.com/symfony/symfony/blob/3.4/src/Symfony/Bundle/FrameworkBundle/Controller/AbstractController.php
    https://symfony.com/doc/current/controller.html :   $this->render() */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    private $tablroduits = [];

    public function __construct()
    {
        $this->tablroduits = [
            ['nom_produit' => 'iPhone X', 'slug_symfony' => 'slugi1', 'description' => 'Un iPhone de 2017'],
            ['nom_produit' => 'iPhone XR', 'slug_symfony' => 'slugi2', 'description' => 'Un iPhone de 2018'],
            ['nom_produit' => 'iPhone XS', 'slug_symfony' => 'slugi3', 'description' => 'Un iPhone de 2018']
        ];
    }

    /**
     * @Route("/tabloduits/affichageAleatoire")
     */
    // http://127.0.0.1:8001/tabloduits/affichageAleatoire
    public function affichageAleatoire()
    {
        // On cherche un produit aléatoirement dans le tableau
        $product = $this->tablroduits[array_rand($this->tablroduits)];

        return $this->render('tabloduits/affichageAleatoire.html.twig', [
            'popoduit' => $product
        ]);
    }

    /**
     * @Route("/tabloduits/{page}", requirements={"page":"\d+"})
     */
    /* @Route("/tabloduits/{slug_symfony}") et 
    @Route("/tabloduits/{page}") étaient identiques,
    Pour différencier {slug_symfony} de {page},
    on exige un nombre :requirements={"page":"\d+"}
    Jusqu'à présent @Route("/tabloduits/{slug_symfony}")
    primait sur @Route("/tabloduits/{page}") car il 
    apparaissait avant dans le code. */
    /*  http://127.0.0.1:8001/tabloduits/1
        http://127.0.0.1:8001/tabloduits/2 */
    //  http://127.0.0.1:8000/tabloduits/1
    public function list($page = 1)
    {
        $indice_depart = $page >= 1 ? /* Si notre page a au moins un article */
                        ($page - 1) * 2 
                        /* Notre page * le nombre d'articles qu'elle contient,
                        si elle contient 2 articles on change de page tout les 2 articles,
                        si elle contient 3 articles on change de page tout les 3 articles,
                        |  0  |  1  |  2  |  3  |  4  |  5  |  n°article
                        |   Page 1  |   Page 2  |   Page 3  |  n°page
                        On retrouve n°article =  (n°page * nbre-article-par-page ) - 2;
                                    n°article =  (n°page * 2 ) - 2;
                                ou  n°article =  (n°page - 1 ) * 2; */
                        : 0; /* Sinon */
        $tablroduits = array_slice($this->tablroduits, $indice_depart, 2);
        /* https://www.php.net/manual/fr/function.array-slice.php
        array_slice() retourne une série d'éléments du tableau array 
        commençant à l'indice de départ et représentant length éléments.  */
        if (empty($tablroduits)) {
            throw $this->createNotFoundException(); /* Page 404 */
        }

        return $this->render('tabloduits/list.html.twig', 
                            [ 'prowduits' => $tablroduits ]
                            );
        /*  https://symfony.com/doc/current/reference/twig_reference.html#render
            render
            {{ render(uri, options = []) }}
            uri
                type: string | ControllerReference
            options (optional)
                type: array default: []  */
    }

    /**
     * @Route("/tabloduits/create")
     */
    public function create()
    {
        return $this->render('tabloduits/create.html.twig'); /* Formulaire en devenir */
    }

    /**
     * @Route("/tabloduits/{slug_symfony}")
     */
    // http://127.0.0.1:8000/tabloduits/slugi2
    public function show($slug_symfony) 
    /* Cette fonction ne se lançait pas car @Route("/tabloduits/{page}")
    de la function list() faisait le travail, donc on ne passait pas
    par cette route. En exigeant un nombre pour la route /tabloduits/{page},
    on la différencie de /tabloduits/{slug_symfony} qui demande un nom d'article. */
    {
        foreach ($this->tablroduits as $produdu) {
            if ($produdu['slug_symfony'] === $slug_symfony) {
                return $this->render('tabloduits/show.html.twig', 
                                    [ 'produitre' => $produdu ]
                                    );
            }
        }

        throw $this->createNotFoundException('Le produit n\'existe pas'); /* Page 404 */
    }

    /**
     * @Route("/tabloduits.json")
     */
    public function api(Request $requete)
    {
        // Si la requête n'est pas en AJAX, on renvoie une 404.
        if (!$requete->isXmlHttpRequest()) {
            throw $this->createNotFoundException();
        }

        return $this->json($this->tablroduits); /* Page 404 */
    }

    /*  public function show($slug = 'iPhone X')
        {
            // Renvoie '{"product":"iPhone X"}'
            return $this->json(['product' => $slug]);
        } */
}
