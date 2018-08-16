<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-11-08
 * Time: 15:27
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Tests\Core\User;

use PHPUnit\Framework\TestCase;
use NoMagic\Bundle\SalesForceOauthBundle\Exception\UserTypeDoNotExistException;
use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceCommunityUser;
use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceUser;
use NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User\SalesForceUserFactory;

class SalesForceUserFactoryTest extends TestCase
{
    /**
     * @var SalesForceUserFactory
     */
    private $responseFactory;

    public function setUp()
    {
        $this->responseFactory = new SalesForceUserFactory();
    }

    public function testCreate()
    {
        $this->assertInstanceOf(SalesForceUser::class, $this->responseFactory->create(SalesForceUser::USER_TYPE));
        $this->assertInstanceOf(SalesForceCommunityUser::class, $this->responseFactory->create(SalesForceCommunityUser::USER_TYPE));

        $this->expectException(UserTypeDoNotExistException::class);
        $this->responseFactory->create('test');
    }
}