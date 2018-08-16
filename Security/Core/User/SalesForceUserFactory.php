<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-09-05
 * Time: 14:54
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User;

use NoMagic\Bundle\SalesForceOauthBundle\Exception\UserTypeDoNotExistException;
use Symfony\Component\Security\Core\User\UserInterface;

class SalesForceUserFactory
{
    /**
     * Creates SalesForce user based on User type
     *
     * @param string $userType
     * @return UserInterface
     */
    public function create(string $userType) : UserInterface
    {
        switch ($userType){
            case SalesForceUser::USER_TYPE:
                return new SalesForceUser();
            case SalesForceCommunityUser::USER_TYPE:
                return new SalesForceCommunityUser();

            default:
                throw new UserTypeDoNotExistException($userType.' is not a valid user type');
        }
    }
}