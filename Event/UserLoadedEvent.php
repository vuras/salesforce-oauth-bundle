<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-08-23
 * Time: 11:42
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

class UserLoadedEvent extends Event
{
    /**
     * Event Name
     */
    const NAME = 'user.loaded';

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * UserLoadedEvent constructor.
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }
}