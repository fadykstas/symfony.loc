<?php
/**
 * Created by PhpStorm.
 * User: StasFadeev
 * Date: 01/16/17
 * Time: 22:30
 */

// src/AppBundle/Entity/Category.php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Category
{
    /**
     * @Assert\NotBlank()
     */
    public $name;
}