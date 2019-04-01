<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Email', EmailType::class, array(
            'attr' => array('class' => 'form-control textField mb-2')))
            ->add('plainPassword', PasswordType::class, array(
                'attr' => array('class' => 'form-control textField mb-2'), 'label' => 'Password'))
            ->add('repeatPlainPassword', PasswordType::class, array(
                'attr' => array('class' => 'form-control textField mb-2'), 'label' => 'Repeat Password'))
            ->add('FullName', TextType::class, array(
                'attr' => array('class' => 'form-control textField mb-2'), 'required' => false))
            ->add('Telephone', TextType::class, array(
                'attr' => array('class' => 'form-control textField mb-2'), 'required' => false))
            ->add('Location', TextType::class, array(
                'attr' => array('class' => 'form-control textField mb-2'), 'required' => false))
            ->add('About', TextareaType::class, array(
                'attr' => array('class' => 'form-control messageField mb-2', 'rows' => '5'), 'required' => false))
            ->add('image', FileType::class, array(
                'attr' => array('class' => 'form-control mb-2'), 'required' => false))
            ->add('save', SubmitType::class, array(
                'label' => 'Register',
                'attr' => array('class' => 'btn btn-primary mt-4 mb-5')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
