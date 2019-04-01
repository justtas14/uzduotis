<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Skill;
use App\Entity\User;
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
     * @Route("/user/{id}", name="cv")
     * @Method({"GET","POST"})
     */
    public function showUser($id)
    {
        $userRepository = $this->getDoctrine()
            ->getRepository(User::class);

         $cv = $userRepository->findOneBy(['id' => $id]);

        // $skillsRepository = $this->getDoctrine()->getRepository(Skill::class);
         //$skills = $skillsRepository->findAll();

        if (!$cv) {
            throw $this->createNotFoundException(
                'No user found'
            );
        }

        return $this->render('cv/index.html.twig', array('mycv' => $cv));
    }
    /**
     *
     * @Route("/newForm/{id}", name="form")
     * @Method({"GET","POST"})
     */
    public function showForm(Request $request, $id)
    {
        $message = new Message();

        $userRepository = $this->getDoctrine()
            ->getRepository(User::class);

        $user = $userRepository->findOneBy(['id' => $id]);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found'
            );
        }

        $message->setUser($user);

        $form = $this->createForm(ContactMe::class, $message);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($message);
            $entityManager->flush();

            return $this->redirectToRoute('cv', ['id' => $id]);
        }

        return $this->render('my_cv/index.html.twig', array('contactForm' => $form->createView()));
    }
}
