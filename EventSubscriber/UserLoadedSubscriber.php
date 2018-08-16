<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-08-23
 * Time: 11:45
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\EventSubscriber;

use NoMagic\Bundle\SalesForceOauthBundle\Event\UserLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserLoadedSubscriber implements EventSubscriberInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * UserLoadedSubscriber constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents() : array
    {
        return [
            UserLoadedEvent::NAME => 'onUserLoaded'
        ];
    }

    /**
     * @param UserLoadedEvent $event
     */
    public function onUserLoaded(UserLoadedEvent $event)
    {
        $this->session->set('user', $event->getUser());
    }

}