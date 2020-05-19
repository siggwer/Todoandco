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
use App\Handler\TaskCreateHandler;
use App\Repository\TaskRepository;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;
use App\Form\TaskType;
use Twig\Environment;
use App\Entity\Task;

/**
 * Class TaskCreateController
 *
 * @package App\Controller
 */
class TaskCreateController
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
     * TaskCreateController constructor.
     *
     * @param TaskRepository                $repository
     * @param TokenStorageInterface         $tokenStorage
     * @param Environment                   $twig
     * @param FormFactoryInterface          $formFactory
     * @param UrlGeneratorInterface         $urlGenerator
     * @param SessionInterface              $messageFlash
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
     * @Route(path="/tasks/create", name="task_create", methods={"GET","POST"})
     *
     * @param Request           $request
     * @param TaskCreateHandler $taskCreateHandler
     *
     * @return RedirectResponse|Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function createTask(
        Request $request,
        TaskCreateHandler $taskCreateHandler
    ) {
        $task = new Task();

        $form = $this->formFactory->create(TaskType::class, $task)
            ->handleRequest($request);

        if ($taskCreateHandler->handle($form, $task)) {
            return new RedirectResponse(
                $this->urlGenerator->generate('task_list'),
                RedirectResponse::HTTP_FOUND
            );
        }

        return new Response(
            $this->twig->render(
                'task/create.html.twig',
                [
                    'form' => $form->createView()
                ]
            ),
            Response::HTTP_OK
        );
    }
}
