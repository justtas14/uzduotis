<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\CvFields;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Email;


class MyCvController extends AbstractController
{
    /**
     * @Route("/", name="cv")
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
        $form = $this->createFormBuilder($visitor)
            ->add('yourEmail', EmailType::class, array('attr' => array('class' => 'form-control')))
            ->add('message', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array(
                'label' => 'Send message',
                'attr' => array('class' => 'btn btn-primary mt-3')))
            ->getForm();

        return $this->render('my_cv/index.html.twig', array('contactForm' => $form->createView()));
    }
}
