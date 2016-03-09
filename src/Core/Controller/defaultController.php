<?php

namespace Core\Controller;

use Silex\Application;

class DefaultController extends CoreController
{

    public function indexAction()
    {
        return $this->render('home/index.twig');
    }

    public function helloAction($name)
    {
        return $this->render('home/hello.twig', ['name' => $this->app->escape($name)]);
    }
}