<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MyController extends Controller
{
    /**
     * @Route("/")
     */
    public function number()
    {
        return $this->render('cv/index.html.twig');

    }
}