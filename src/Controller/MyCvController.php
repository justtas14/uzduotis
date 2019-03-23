<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\CvFields;
use App\Form\ContactMe;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Validator\Constraints\Email;


class MyCvController extends AbstractController
{
    /**
     * @Route("/", name="cv")
     *
     */
    public function index()
    {
        $cv = $this->getDoctrine()
            ->getRepository(CvFields::class)->findAll();

        if (!$cv) {
            throw $this->createNotFoundException(
                'No cv found'
            );
        }


        return $this->render('cv/index.html.twig', array('mycv' => $cv));
    }
    /**
     *
     * @Route("/newForm", name="form")
     * @Method({"GET","POST"})
     */
    public function showForm(Request $request)
    {
        $visitor = new Contact();
        $form = $this->createForm(ContactMe::class, $visitor);


        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $visitor = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($visitor);
            $entityManager->flush();

            return $this->redirectToRoute('cv');
        }


        return $this->render('my_cv/index.html.twig', array('contactForm' => $form->createView()));
    }
}
