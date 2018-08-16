<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-11-08
 * Time: 16:24
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Tests\Core\User;

use PHPUnit\Framework\TestCase;
use NoMagic\Bundle\SalesForceOauthBundle\OAuth\Response\SalesForceUserResponse;
use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceUser;
use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceUserProvider;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\User;

class SalesForceUserProviderTest extends TestCase
{
    /**
     * @var SalesForceUserProvider
     */
    private $provider;

    public function setUp()
    {
        $session = $this->getMockBuilder(Session::class)
            ->setMethods(['has', 'get'])
            ->disableOriginalConstructor()
            ->getMock();

        $session->expects($this->any())
            ->method('has')
            ->with($this->equalTo('user'))
            ->willReturn(true);

        $user = new SalesForceUser('test');
        $session->expects($this->any())
            ->method('get')
            ->with($this->equalTo('user'))
            ->willReturn($user);

        $eventDispatcher = $this->createMock(EventDispatcher::class);

        $this->provider = new SalesForceUserProvider($session, $eventDispatcher);
    }

    public function testLoadUserByUsername()
    {
        $user = $this->provider->loadUserByUsername('test');
        $this->assertInstanceOf(SalesForceUser::class, $user);
        $this->assertEquals('test', $user->getUsername());
    }

    public function testLoadUserByOAuthUserResponse()
    {
        $user = new SalesForceUser('test');
        $response = new \SalesForceOauthBundle\Tests\Fixtures\SalesForceUserResponse();

        $this->provider->loadUserByOAuthUserResponse($response);
        $this->assertInstanceOf(SalesForceUser::class, $user);
        $this->assertEquals('test', $user->getUsername());
    }

    public function testRefreshUser()
    {
        $user = new SalesForceUser('test');

        $freshUser = $this->provider->refreshUser($user);
        $this->assertEquals($user, $freshUser);
    }

    /**
     * @expectedException \Symfony\Component\Security\Core\Exception\UnsupportedUserException
     * @expectedExceptionMessage Unsupported user class "Symfony\Component\Security\Core\User\User"
     */
    public function testRefreshUserUnsupportedClass()
    {
        $user = new User('test', 'test');

        $this->provider->refreshUser($user);
    }
}