<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-11-08
 * Time: 16:17
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Tests\Core\User;

use PHPUnit\Framework\TestCase;
use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceUser;

class SalesForceUserTest extends TestCase
{
    /**
     * @var SalesForceUser
     */
    protected $user;

    public function setUp()
    {
        $this->user = new SalesForceUser('test');
    }

    public function testGetRoles()
    {
        $this->assertEquals(array('ROLE_USER', 'ROLE_SALESFORCE_USER'), $this->user->getRoles());
    }

    public function testGetPassword()
    {
        $this->assertNull($this->user->getPassword());
    }

    public function testGetSalt()
    {
        $this->assertNull($this->user->getSalt());
    }

    public function testGetUsername()
    {
        $this->assertEquals('test', $this->user->getUsername());

        $user = new SalesForceUser('other');
        $this->assertEquals('other', $user->getUsername());
    }

    public function testEraseCredentials()
    {
        $this->assertTrue($this->user->eraseCredentials());
    }

    public function testEquals()
    {
        $otherUser = new SalesForceUser('other');
        $sameUser = new SalesForceUser('test');

        $this->assertFalse($this->user->equals($otherUser));
        $this->assertTrue($this->user->equals($sameUser));
    }
}