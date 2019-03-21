<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\CvFields;

class MyCvController extends AbstractController
{
    /**
     * @Route("/my/cv", name="my_cv")
     */
    public function index()
    {
        /*$entityManager = $this->getDoctrine()->getManager();

        $cvinf = new CvFields();
        $cvinf->setFullName('Justas Santockis');
        $cvinf->setAbout('Something about me');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($cvinf);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('my_cv/index.html.twig', [
            'controller_name' => 'MyCvController',
        ]);*/

        $cv = $this->getDoctrine()
            ->getRepository(CvFields::class);

        if (!$cv) {
            throw $this->createNotFoundException(
                'No cv found for id '.$id
            );
        }

        return $this->render('cv/index.html.twig', ['mycv' => $cv]);
    }
}
