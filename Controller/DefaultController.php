<?php

namespace NoMagic\Bundle\SalesForceOauthBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

            // replace this example code with whatever you need
            return $this->render('@SalesForceOauth/index.html.twig');
        }

        return $this->redirectToRoute('salesforce_login');
    }
}
