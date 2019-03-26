<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\CvFields;
use App\Entity\Skills;
use App\Form\ContactMe;
use App\Service\PushToDatabase;


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
        $userRepository = $this->getDoctrine()
            ->getRepository(CvFields::class);

         $cv = $userRepository->findOneBy([]);

         $skillsRepository = $this->getDoctrine()->getRepository(Skills::class);
         $skills = $skillsRepository->findAll();

        if (!$cv) {
            throw $this->createNotFoundException(
                'No cv found'
            );
        }


        return $this->render('cv/index.html.twig', array('skills' => $skills, 'mycv' => $cv));
    }
    /**
     *
     * @Route("/newForm", name="form")
     * @Method({"GET","POST"})
     */
    public function showForm(Request $request, PushToDatabase $pushToDatabase)
    {
        $visitor = new Contact();
        $form = $this->createForm(ContactMe::class, $visitor);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $visitor = $form->getData();

            $pushToDatabase->pushIt($visitor);
            /*
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($visitor);
            $entityManager->flush();
            */

            return $this->redirectToRoute('cv');
        }


        return $this->render('my_cv/index.html.twig', array('contactForm' => $form->createView()));
    }
}
