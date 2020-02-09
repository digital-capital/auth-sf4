<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    /**
     * @Route("/roles", name="app_roles")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function roles()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/update_roles", name="app_update_roles")
     * @Security("has_role('ROLE_USER')")
     */
    public function update_roles()
    {
        $this->getUser()->setRoles(['ROLE_ADMIN']);
        $this->getDoctrine()->getManager()->persist($this->getUser());
        $this->getDoctrine()->getManager()->flush();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
