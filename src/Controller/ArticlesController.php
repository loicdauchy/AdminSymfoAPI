<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Category;
use App\Entity\Commandes;
use App\Form\ArticleType;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticlesController extends AbstractController
{



     /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {

        return $this->render('security/login.html.twig', [
        ]);
    }

    /**
     * @Route("/articles", name="articles")
     */
    public function show(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $articlesShow = $repo->findAll();

        return $this->render('articles/show.html.twig', [
            'articles' => $articlesShow,
        ]);
    }

    /**
     * @Route("/addArticles", name="addArticles")
     */
    public function Add(Request $request, EntityManagerInterface $manager): Response
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $articlesShow = $repo->findAll();

        $article = new Articles();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('articles');
        }

        return $this->render('articles/index.html.twig', [
            'articles' => $articlesShow,
            'addArticle' => $form->createView()
        ]);
    }

    /**
     * @Route("/edite/{id}", name="edite")
     * 
     */
    public function update(Request $request, EntityManagerInterface $manager, Articles $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('articles');
        }
       
        return $this->render('articles/update.html.twig', [
            'article' => $article,
            'upForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     * 
     */
    public function delete(EntityManagerInterface $manager, Articles $article): Response
    {
        $manager->remove($article);
        $manager->flush();
        return $this->redirectToRoute('articles');
    }


    /**
     * @Route("/addCategory", name="addCategory")
     */
    public function AddCategory(Request $request, EntityManagerInterface $manager): Response
    {
        
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($category);
            $manager->flush();
            return $this->redirectToRoute('articles');
        }

        return $this->render('articles/category.html.twig', [
            'addCategory' => $form->createView()
        ]);
    }

     /**
     * @Route("/commandes", name="commandes")
     */
    public function showCommandes(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Commandes::class);
        $commandesShow= $repo->findAll();

        return $this->render('articles/commandes.html.twig', [
            'commandes' => $commandesShow,
        ]);
    }

        /**
     * @Route("/deleteC/{id}", name="deleteC")
     * 
     */
    public function deleteC(EntityManagerInterface $manager, Commandes $commandes): Response
    {
        $manager->remove($commandes);
        $manager->flush();
        return $this->redirectToRoute('commandes');
    }
}
