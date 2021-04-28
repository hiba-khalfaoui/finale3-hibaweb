<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Entity\Formation;
use App\Entity\Categorie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $forms = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'forms' => $forms
        ]);
    }

    /**
     * @Route("/admin", name="home_back")
     */
    public function index1(): Response
    {

        return $this->render('home/index1.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/rech" , name="rech")
     */
    public function rech(Request $request)
    {
        $champ = $request->request->get('rech');
        $cours = $this->getDoctrine()->getRepository(Cours::class)->findOneBy(['id' => $champ]);
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->findOneBy(['idCatégorie' => $champ]);
        

        if ($cours != NULL)
            return $this->render("cours/show.html.twig", [
                'cour' => $cours
            ]);
        elseif ($categorie != NULL)
            return $this->render("categorie/show.html.twig", [
                'categorie' => $categorie
            ]);


        $cours = $this->getDoctrine()->getRepository(Cours::class)->findOneBy(['titre' => $champ]);
        $categorie = $this->getDoctrine()->getRepository(categorie::class)->findOneBy(['description' => $champ]);
        

        if ($cours != NULL)
            return $this->render("cours/show.html.twig", [
                'cour' => $cours
            ]);
        elseif ($categorie != NULL)
            return $this->render("categorie/show.html.twig", [
                'categorie' => $categorie
            ]);




        return 0;

    }


}
