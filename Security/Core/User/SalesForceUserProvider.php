<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-08-11
 * Time: 10:32
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;
use NoMagic\Bundle\SalesForceOauthBundle\Event\UserLoadedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class SalesForceUserProvider implements UserProviderInterface, OAuthAwareUserProviderInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * SalesForceUserProvider constructor.
     * @param SessionInterface $session
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(SessionInterface $session, EventDispatcherInterface $eventDispatcher)
    {
        $this->session = $session;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {
        if($this->session->has('user')){
            return $this->session->get('user');
        }

        return new SalesForceUser($username);
    }

    /**
     * @param UserResponseInterface $response
     * @return UserInterface
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $user = $this->createUser($response);

        $event = new UserLoadedEvent($user);
        $this->eventDispatcher->dispatch($event::NAME, $event);

        return $user;
    }

    /**
     * @param UserResponseInterface $response
     * @return UserInterface
     */
    private function createUser(UserResponseInterface $response)
    {
        $factory = new SalesForceUserFactory();
        $user = $factory->create($response->getUserType());

        $user->setId($response->getId());
        $user->setUsername($response->getUsername());
        $user->setEmail($response->getEmail());
        $user->setFirstName($response->getFirstName());
        $user->setLastName($response->getLastName());

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$this->supportsClass(get_class($user))) {
            throw new UnsupportedUserException(sprintf('Unsupported user class "%s"', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {
        return in_array(SalesForceUserInterface::class, class_implements($class));
    }
}