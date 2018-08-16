<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-09-05
 * Time: 16:49
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User;


interface SalesForceUserInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getEmail() : string;

    /**
     * @return mixed
     */
    public function getFirstName() : string;

    /**
     * @return mixed
     */
    public function getLastName() : string;
}