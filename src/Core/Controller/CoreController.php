<?php

namespace Core\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CoreController
{
    /**
     * @var \Silex\Application
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function setApp(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param $templateName
     * @param array $params
     * @return Response
     */
    protected function render($templateName, $params = array())
    {
        $body = $this->app['twig']->render('@Core/' . $templateName, $params);
        return new Response($body);
    }

    /**
     * @param array $params
     * @return JsonResponse
     */
    protected function json($params)
    {
        return new JsonResponse($params);
    }
}