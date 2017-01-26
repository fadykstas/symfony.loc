<?php
/**
 * Created by PhpStorm.
 * User: StasFadeev
 * Date: 01/15/17
 * Time: 16:34
 */

// src/AppBundle/Entity/Task.php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Category;

class Task
{
    /**
     * @Assert\NotBlank(message="Пустое значение недопустимо")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Task must be at least {{ limit }} characters long",
     *      maxMessage = "Task cannot be longer than {{ limit }} characters"
     * )
     */
    protected $task;

    /**
     * @Assert\Type(type="AppBundle\Entity\Category")
     * @Assert\Valid()
     */
    protected $category;


    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="integer", message="Только целое число")
     * @Assert\GreaterThan(0, message="Только больше 0")
     */
    protected $hoursSpent;

    /**
     * @Assert\NotBlank()
     */
    protected $dueDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueTimes;

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category Define category of task.
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;
    }


    public function getHoursSpent(){
        return $this->hoursSpent;
    }

    public function setHoursSpent($hours){
//        $hours = (int)$hours;
        $this->hoursSpent = $hours;
    }


    public function getDueTimes()
    {
        return $this->dueTimes;
    }

    public function setDueTimes(\DateTime $dueTimes = null)
    {
        $this->dueTimes = $dueTimes;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}