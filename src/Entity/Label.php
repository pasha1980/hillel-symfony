<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ApiResource()
 */
class Label
{
    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    public int $id;

    /**
     * @var string
     * @ORM\Column()
     */
    public string $name;

    /**
     * @var string
     * @ORM\Column()
     */
    public string $color;

    /*
     * inversedBy
     * mappedBy
     */

    /**
     * @ORM\ManyToMany(
     *     targetEntity=Task::class,
     *     inversedBy="labels"
     * )
     */
    public $tasks;
}