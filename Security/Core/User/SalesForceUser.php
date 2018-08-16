<?php
/**
 * Created by PhpStorm.
 * User: artbut
 * Date: 2017-08-11
 * Time: 12:25
 */

namespace NoMagic\Bundle\SalesForceOauthBundle\Security\Core\User;

use Symfony\Component\Security\Core\User\UserInterface;

class SalesForceUser implements UserInterface, SalesForceUserInterface
{
    /**
     * SalesForce User type
     */
    const USER_TYPE = 'STANDARD';

    /**
     * Role name
     */
    const ROLE = 'ROLE_SALESFORCE_USER';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * SalesforceUser constructor.
     * @param string $username
     */
    public function __construct(string $username = null)
    {
        $this->username = $username;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return array('ROLE_USER', static::ROLE);
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->username;
    }

}