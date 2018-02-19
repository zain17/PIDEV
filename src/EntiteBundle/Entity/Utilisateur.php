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
 * @ORM\Table(name="fos_user")
 */
class Utilisateur extends BaseUser
{

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $photoProfil;




}