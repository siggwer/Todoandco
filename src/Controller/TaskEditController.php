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
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\OptimisticLockException;
use App\Repository\TaskRepository;
use App\Handler\TaskEditHandler;
use Doctrine\ORM\ORMException;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use App\Voter\TaskVoter;
use App\Form\TaskType;
use Twig\Environment;
use App\Entity\Task;

/**
 * Class TaskEditController
 *
 * @package App\Controller
 */
class TaskEditController
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
     * TaskEditController constructor.
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
     * @Route(path="/tasks/edit/{id}", name="task_edit", methods={"GET","POST"})
     *
     * @param Task $task
     * @param Request $request
     * @param TaskEditHandler $taskEditHandler
     *
     * @return RedirectResponse|Response
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function taskEdit(
        Task $task,
        Request $request,
        TaskEditHandler $taskEditHandler
    ) {
        if ($this->authorization->isGranted(TaskVoter::EDIT, $task) === true) {

            $form = $this->formFactory->create(TaskType::class, $task)
                ->handleRequest($request);

            if ($taskEditHandler->handle($form)) {

                return new RedirectResponse(
                    $this->urlGenerator->generate('task_list'),
                    RedirectResponse::HTTP_FOUND
                );
            }

            return new Response(
                $this->twig->render(
                    'task/edit.html.twig', [
                        'form' => $form->createView(),
                        'task' => $task,
                    ]
                ), Response::HTTP_OK
            );
        }

        return new Response(
            $this->twig->render(
                'error/error.html.twig', [
                    'error' => "Erreur : Impossible d'éditer cette tâche."
                ]
            ), Response::HTTP_OK
        );
    }

}