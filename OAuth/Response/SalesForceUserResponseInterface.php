<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-08-22
 * Time: 11:49
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\OAuth\Response;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

interface SalesForceUserResponseInterface extends UserResponseInterface
{
    /**
     * Returns SalesForce User ID
     *
     * @return string
     */
    public function getId() : string;

    /**
     * Returns SalesForce user type
     *
     * @return string
     */
    public function getUserType() : string;
}