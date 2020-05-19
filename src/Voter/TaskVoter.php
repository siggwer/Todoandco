<?php

namespace App\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use App\Entity\User;
use App\Entity\Task;
use LogicException;

/**
 * Class TaskVoter
 *
 * @package App\Voter
 */
class TaskVoter extends Voter
{
    /**
     *
     */
    const EDIT = 'edit';

    /**
     *
     */
    const DELETE = 'delete';

    /**
     * @param $attribute
     * @param $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject): bool
    {
        if (!in_array($attribute, [self::EDIT, self::DELETE])) {
            return false;
        }

        if (!$subject instanceof Task) {
            return false;
        }

        return true;
    }

    /**
     * @param string         $attribute
     * @param mixed          $subject
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }

        $task = $subject;

        switch ($attribute) {
        case self::EDIT:
            return $this->canEdit($task, $user);
        case self::DELETE:
            return $this->canDelete($task, $user);
        }

        throw new LogicException('This code should not be reached!');
    }

    /**
     * @param Task $task
     * @param User $user
     *
     * @return bool
     */
    private function canEdit(Task $task, User $user): bool
    {
        return $user === $task->getUser();
    }

    /**
     * @param Task $task
     * @param User $user
     *
     * @return bool
     */
    private function canDelete(Task $task, User $user)
    {
        if ($task->getUser() === null & $user->getRoles() === ['ROLE_ADMIN'] or $user === $task->getUser()) {
            return true;
        }
        return false;
    }
}
