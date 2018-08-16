<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-09-22
 * Time: 16:24
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class ExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * ExceptionSubscriber constructor.
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [ 'redirectOnSessionExpiredException', -2 ]
        ];
    }

    /**
     * Forces to logout on SalesForce session expired error
     *
     * @param GetResponseForExceptionEvent $event
     * @return RedirectResponse
     */
    public function redirectOnSessionExpiredException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if(json_decode($exception->getMessage())){
            $errors = json_decode($exception->getMessage());
            foreach ($errors as $error){
                if($error->errorCode === 'INVALID_SESSION_ID'){
                    $event->setResponse(new RedirectResponse($this->router->generate('logout')));
                }
            }
        }
    }
}