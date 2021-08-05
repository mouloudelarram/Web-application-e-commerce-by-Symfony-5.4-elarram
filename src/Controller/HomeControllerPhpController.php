<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeControllerPhpController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    #[Route('/home/controller/php', name: 'home')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repo->findAll();

        #dd($articles);

        return $this->render("home/index.html.twig",['articles' => $articles,]);
    }
    
     /**
     * @Route("show/{id}", name="show")
     */
    #[Route('show/{id}', name: 'show')]
    public function show($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $article = $repo->find($id);

        if(!$article){
            return $this->redirectToRoute('home');
        }

        return $this->render("show/index.html.twig",['article' => $article,]);
    }

    /**
     * @Route("index", name="index")
     */
    #[Route('index', name: 'index')]
    public function door(): Response
    {
        return $this->render("index/index.html.twig");
    }

    
    /**
     * @Route("about", name="about")
     */
    #[Route('about', name: 'about')]
    public function about(): Response
    {
        return $this->render("about/index.html.twig");
    }


    /**
     * @Route("commande", name="commande")
     */
    #[Route('commande', name: 'commande')]
    public function commande(): Response
    {
        return $this->render("commande/index.html.twig");
    }
}
