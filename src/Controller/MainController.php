<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        if ($this->getUser()) {
            $username = $this->getUser()->getUsername();
            echo strval($username) . " - MainController";
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
