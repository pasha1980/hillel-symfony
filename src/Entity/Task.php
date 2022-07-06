<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ApiResource()
 */
class Task
{
    public function __construct()
    {
        $this->labels = new ArrayCollection();
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
    public string $title;

    /**
     * @var string
     * @ORM\Column()
     */
    public string $content;

    /**
     * @var Status
     * @ORM\ManyToOne(targetEntity=Status::class)
     */
    public Status $status;

    /**
     * @ORM\ManyToMany(
     *     targetEntity=Label::class,
     *     mappedBy="tasks",
     *     cascade={"persist"}
     * )
     */
    public $labels;

    public function addLabel(Label $label): self
    {
        $this->labels->add($label);
        $label->tasks->add($this);
        return $this;
    }

    public function removeLabel(Label $label): self
    {
        $this->labels->removeElement($label);
        $label->tasks->removeElement($this);
        return $this;
    }
}