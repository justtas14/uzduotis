<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     * @Method({"GET","POST"})
     */
    public function login(ValidatorInterface $validator, Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $user = new User();
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $usersRepository = $this->getDoctrine()
            ->getRepository(User::class);

        $users = $usersRepository->findAll();

        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('/');
        }


        return $this->render('security/login.html.twig', array('last_username' => $lastUsername, 'error' => $error,
            'cvs' => $users, 'registerForm' => $form->createView()));
    }
}