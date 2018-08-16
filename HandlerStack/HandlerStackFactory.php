<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-11-02
 * Time: 10:36
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\HandlerStack;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerInterface;

class HandlerStackFactory
{
    /**
     * @param LoggerInterface $logger
     * @param MessageFormatter $messageFormatter
     * @return HandlerStack
     */
    public static function create(LoggerInterface $logger, MessageFormatter $messageFormatter)
    {
        $handlerStack = new HandlerStack();
        $handlerStack->setHandler(\GuzzleHttp\choose_handler());

        $handlerStack->push(Middleware::log($logger, $messageFormatter));

        return $handlerStack;
    }
}