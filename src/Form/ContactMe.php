<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactMe extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('yourEmail', EmailType::class, array(
            'attr' => array('class' => 'form-control textField')))
            ->add('message', TextareaType::class, array(
            'attr' => array('class' => 'form-control messageField', 'rows' => '5')))
            ->add('save', SubmitType::class, array(
            'label' => 'Send message',
             'attr' => array('class' => 'btn btn-primary mt-3')));
    }
}