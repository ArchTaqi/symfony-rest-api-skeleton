<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @Route("/users")
 */
class UserController extends AbstractFOSRestController
{
    /**
     * @Route("/me")
     */
    public function getMeAction()
    {
        return View::create(array("user" => $this->getUser()));
    }
}
