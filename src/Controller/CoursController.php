<?php

namespace App\Controller;

use Knp\Snappy\Pdf;
use App\Entity\Cours;
use App\Form\CoursType;
use App\Entity\Categorie;
use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/cours")
 */
class CoursController extends AbstractController
{
    /**
     * @Route("/", name="cours_index", methods={"GET"})
     */
    public function index(): Response
    {
        $cours = $this->getDoctrine()
            ->getRepository(Cours::class)
            ->findAll();
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();

        return $this->render('cours/index.html.twig', [
            'cours' => $cours,
            'forms' => $formation
        ]);
    }


    /**
     * @Route("/new", name="cours_new", methods={"GET","POST"})
     */
    public function new(Request $request ): Response
    {
        $cour = new Cours();        
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);
        $cat = new Categorie();
        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        if ($form->isSubmitted() && $form->isValid()) {

            $cat=$this->getDoctrine()->getRepository(Categorie::class)->findOneBy(['description'=>$request->request->get('categorie')]);
            $cour = $cour->setCategorieId($cat->getIdCatégorie());
            $cour=$cour->setFormationId($request->request->get('formation'));
            $cour = $cour->setFavoris(false);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cour);
            $entityManager->flush();

            return $this->redirectToRoute('cours_index');
        }

        return $this->render('cours/new.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
            'categories' => $categories,
            'formations' => $formations
        ]);
    }
    /**
     * @Route("/liste_favoris", name="liste_favoris", methods={"GET"})
     */
    public function listeFavoris(Request $request): Response
    {
        $cours = $this->getDoctrine()
        ->getRepository(Cours::class)
        ->findBy(['favoris' => 1]);
        
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        

        return $this->render("cours/favoris.html.twig",[
            'cours' => $cours,
            'forms' => $formation
        ]);
    }

    /**
     * @Route("/liste_favoris_front", name="liste_favoris_front", methods={"GET"})
     */
    public function listeFavorisFront(EntityManagerInterface $em,Request $request,PaginatorInterface $paginator): Response
    {
        $cours = $this->getDoctrine()
        ->getRepository(Cours::class)
        ->findBy(['favoris' => 1]);
        
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        
        $cour1 = $paginator->paginate(
            $cours, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );

        return $this->render("cours/favoris_front.html.twig",[
            'cours' => $cour1,
            'forms' => $formation,
            
        ]);
    }
    /**
     * @Route("/pdf_favoris" , name="pdf_favoris")
     */

    public function pdfAction(\Knp\Snappy\Pdf $knpSnappyPdf)
    {
        
        $cours = $this->getDoctrine()
        ->getRepository(Cours::class)
        ->findBy(['favoris' => 1]);
        
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        $html = $this->renderView('cours/pdf.html.twig', array(
            'cours' => $cours,
            'forms' => $formation
        ));

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'file.pdf'
        );
    }

    /**
     * @Route("/{id}", name="cours_show", methods={"GET"})
     */
    public function show(Cours $cour): Response
    {
        return $this->render('cours/show.html.twig', [
            'cour' => $cour,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cours_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cours $cour): Response
    {
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cours_index');
        }

        return $this->render('cours/edit.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
            'formations' => $formations,
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/delete/{id}", name="cours_delete")
     */
    public function delete(Request $request, Cours $cour): Response
    {
        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cour);
            $entityManager->flush();
        

        return $this->redirectToRoute('cours_index');
    }

    /**
     * @Route("/cours/{id}" , name="front_cours")
     */
    public function front_index($id){
        $cours = $this->getDoctrine()->getRepository(Cours::class)->findBy(['formationId' => $id]);
        $forms = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        return $this->render('cours/index1.html.twig',[
                'cours' => $cours,
            'forms' => $forms
        ]);
    }

    /**
     * @Route("/favoris_add/{id}" , name="favoris_add")
     */
    public function favorisAdd(Cours $cour){
        
        $cour = $cour->setFavoris(1);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        $cours= $this->getDoctrine()->getRepository(Cours::class)->findBy(['favoris' => 1]);
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        return $this->render("cours/favoris.html.twig",[
            'cours' => $cours,
            'forms' => $formation
        ]);
    }

     /**
     * @Route("/favoris_remove/{id}" , name="favoris_remove")
     */
    public function favorisRemove(Cours $cour){
        
        $cour = $cour->setFavoris(0);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        $cours= $this->getDoctrine()->getRepository(Cours::class)->findBy(['favoris' => 1]);
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        return $this->render("cours/favoris.html.twig",[
            'cours' => $cours,
            'forms' => $formation
        ]);
    }

    /**
     * @Route("/favoris_add_front/{id}" , name="favoris_add_front")
     */
    public function favorisAddFront(Cours $cour){
        
        $cour = $cour->setFavoris(1);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        $cours= $this->getDoctrine()->getRepository(Cours::class)->findBy(['favoris' => 1]);
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        return $this->render("cours/favoris_front.html.twig",[
            'cours' => $cours,
            'forms' => $formation
        ]);
    }

     /**
     * @Route("/favoris_remove_front/{id}" , name="favoris_remove_front")
     */
    public function favorisRemoveFront(Cours $cour){
        
        $cour = $cour->setFavoris(0);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        $cours= $this->getDoctrine()->getRepository(Cours::class)->findBy(['favoris' => 1]);
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        return $this->render("cours/favoris_front.html.twig",[
            'cours' => $cours,
            'forms' => $formation
        ]);
    }

    
   


}