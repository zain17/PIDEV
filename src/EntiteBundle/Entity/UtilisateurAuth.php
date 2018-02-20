<?php
/**
 * Created by PhpStorm.
 * User: aminos
 * Date: 2/19/18
 * Time: 8:28 PM
 */

namespace EntiteBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurAuth")
 */
class UtilisateurAuth extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }


}