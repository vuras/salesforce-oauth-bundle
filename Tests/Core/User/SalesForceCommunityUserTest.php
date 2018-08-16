<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-11-08
 * Time: 16:21
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Tests\Core\User;

use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceCommunityUser;

class SalesForceCommunityUserTest extends SalesForceUserTest
{
    public function setUp()
    {
        $this->user = new SalesForceCommunityUser('test');
    }

    public function testGetRoles()
    {
        $this->assertEquals(array('ROLE_USER', 'ROLE_SALESFORCE_COMMUNITY_USER'), $this->user->getRoles());
    }
}