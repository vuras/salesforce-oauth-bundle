<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-08-22
 * Time: 11:40
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\OAuth\Response;

use HWI\Bundle\OAuthBundle\OAuth\Response\PathUserResponse;

class SalesForceUserResponse extends PathUserResponse implements SalesForceUserResponseInterface
{
    /**
     * @var array
     */
    protected $paths = array(
        'id'                => null,
        'identifier'        => null,
        'nickname'          => null,
        'firstname'         => null,
        'lastname'          => null,
        'realname'          => null,
        'email'             => null,
        'user_type'         => null,
        'profilepicture'    => null
    );

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->getValueForPath('id');
    }

    /**
     * @return string
     */
    public function getUserType() : string
    {
        return $this->getValueForPath('user_type');
    }
}