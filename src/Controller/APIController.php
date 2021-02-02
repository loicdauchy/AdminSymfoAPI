<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api", name="api_")
 */
class APIController extends AbstractController
{
    /**
     * @Route("/liste", name="liste", methods={"GET"})
     */
    public function index(ArticlesRepository $articlesRepository): Response
    {
        $articles = $articlesRepository->findAll();
        
        $encoders = [new JsonEncoder()];

        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($articles, 'json', [
            'circular_reference_handler' => function($object){
                return $object->getId();
            }
        ]);

        $response = new Response($jsonContent);

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }

    /**
     * @Route("/categoryListe", name="categoryList", methods={"GET"})
     */
    public function categoryAPI(CategoryRepository $categoryRepository): Response
    {
        $articles = $categoryRepository->findAll();
        
        $encoders = [new JsonEncoder()];

        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($articles, 'json', [
            'circular_reference_handler' => function($object){
                return $object->getId();
            }
        ]);

        $response = new Response($jsonContent);

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }


/**
 * @Route("/commandes", name="commandes", methods={"POST"})
 */
public function addCommandes(Request $request)
{     
       
        
        // On instancie un nouvel article
        // $article = new Articles();

        // On décode les données envoyées
        $donnees = json_decode($request->getContent());
        dd($donnees);

        // On hydrate l'objet
        // $article->setTitre($donnees->titre);
        // $article->setContenu($donnees->contenu);
        // $article->setFeaturedImage($donnees->image);
        // $user = $this->getDoctrine()->getRepository(Users::class)->findOneBy(["id" => 1]);
        // $article->setUsers($user);

        // On sauvegarde en base
        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist($article);
        // $entityManager->flush();

        // On retourne la confirmation
        // return new Response('ok', 201);
    }

}
