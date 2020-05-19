<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;
use Twig\Environment;

/**
 * Class UserListController
 *
 * @package App\Controller
 */
class UserListController
{
    /**
     * @Route(path="/users/list", name="user_list", methods={"GET"})
     *
     * @param UserRepository $repository
     * @param Environment    $twig
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function listUser(UserRepository $repository, Environment $twig)
    {
        $user = $repository->findAll();

        return new Response(
            $twig->render(
                'user/list.html.twig',
                [
                'users' => $user
                ]
            ),
            Response::HTTP_OK
        );
    }
}
