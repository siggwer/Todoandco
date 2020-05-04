<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TaskRepository;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;
use App\Voter\TaskVoter;
use Twig\Environment;
use App\Entity\Task;

/**
 * Class TaskDeleteController
 *
 * @package App\Controller
 */
class TaskDeleteController
{
    /**
     * @var TaskRepository
     */
    private $repository;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorization;

    /**
     * TaskDeleteController constructor.
     *
     * @param TaskRepository $repository
     * @param TokenStorageInterface $tokenStorage
     * @param Environment $twig
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $messageFlash
     * @param AuthorizationCheckerInterface $authorization
     */
    public function __construct(
        TaskRepository $repository,
        TokenStorageInterface $tokenStorage,
        Environment $twig,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash,
        AuthorizationCheckerInterface $authorization
    ) {
        $this->repository = $repository;
        $this->tokenStorage = $tokenStorage;
        $this->twig = $twig;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->messageFlash = $messageFlash;
        $this->authorization = $authorization;
    }

    /**
     * @Route(path="/tasks/delete/{id}", name="task_delete", methods={"GET"})
     *
     * @param Task $task
     *
     * @return RedirectResponse|Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function TaskDelete(Task $task)
    {
        if ($this->authorization->isGranted(TaskVoter::DELETE, $task) === true) {

            $this->repository->delete($task);

            $this->messageFlash->getFlashBag()->add('success', "Tâche supprimée.");

            return new RedirectResponse(
                $this->urlGenerator->generate('task_list'),
                RedirectResponse::HTTP_FOUND
            );
        }
        return new Response(
            $this->twig->render(
                'error/error.html.twig', [
                    'error' => 'Erreur : Impossible de supprimer cette tâche.'
                ]
            ), Response::HTTP_OK
        );
    }
}