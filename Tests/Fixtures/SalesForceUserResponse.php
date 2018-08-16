<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-11-09
 * Time: 10:57
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Tests\Fixtures;

use HWI\Bundle\OAuthBundle\OAuth\Response\PathUserResponse;
use NoMagic\Bundle\SalesForceOauthBundle\OAuth\Response\SalesForceUserResponseInterface;
use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceUser;

class SalesForceUserResponse extends PathUserResponse implements SalesForceUserResponseInterface
{
    public function getId(): string
    {
        return 'ID';
    }

    public function getUrls(): array
    {
        return [];
    }

    public function getUserType(): string
    {
        return SalesForceUser::USER_TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function getNickname()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function getLastName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return 'test';
    }
}