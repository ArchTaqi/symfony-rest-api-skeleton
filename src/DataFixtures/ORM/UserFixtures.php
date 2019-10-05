<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use App\Manager\UserManager;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class UserFixtures to load sample user data.
 * @package App\DataFixtures\ORM
 */
class UserFixtures implements ORMFixtureInterface
{
    /**
     * Sample data for users.
     */
    const USER_DATA = array(
        array("Muhammad", "Taqi"),
        array("Muhammad", "Turab"),
        array("Muhammad", "Hamza"),
        array("Ali", "Salman"),
        array("Meesum", "Raza"),
        array("Minhal", "Raza"),
    );

    /**
     * @var UserManager $userManager
     */
    protected $userManager;

    /**
     * UserFixtures constructor with constructor injection.
     *
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * The function loads user data into database.
     *
     * @param ObjectManager $manager
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function load(ObjectManager $manager)
    {
        foreach(self::USER_DATA as $userData) {
            $user = new User();
            $user->setUsername(strtolower($userData[0] . "." . $userData[1]));
            $user->setEmail(strtolower($userData[0]) . "@local.de");
            $user->setPlainPassword(strtolower($userData[0]));

            $this->userManager->updateUser($user);
        }
    }
}
