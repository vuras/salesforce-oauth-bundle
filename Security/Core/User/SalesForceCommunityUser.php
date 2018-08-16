<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-09-05
 * Time: 14:38
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User;


class SalesForceCommunityUser extends SalesForceUser
{
    /**
     * SalesForce User type
     */
    const USER_TYPE = 'CSP_LITE_PORTAL';

    /**
     * Role name
     */
    const ROLE = 'ROLE_SALESFORCE_COMMUNITY_USER';
}