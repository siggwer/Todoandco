<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Environment;

/**
 * Class DefaultContoller
 *
 * @package App\Controller
 */
class DefaultContoller
{
    /**
     * @Route(path="/", name="home", methods={"GET"})
     *
     * @param Environment $twig
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(Environment $twig)
    {
        return new Response(
            $twig->render('default/index.html.twig'),
            Response::HTTP_OK
        );
    }
}