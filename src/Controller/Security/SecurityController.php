<?php

namespace App\Controller\Security;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class SecurityController
 *
 * @package App\Controller
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     *
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils, Environment $twig): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return new Response(
            $twig->render(
                'security/login.html.twig', [
                    'last_username' => $lastUsername,
                    'error'         => $error,
                ]
            ), Response::HTTP_OK
        );
    }

    /**
     * @Route("/logout", name="security_logout")
     *
     * @codeCoverageIgnore
     */
    public function logout()
    {
    }
}
