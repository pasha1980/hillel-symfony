<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ApiResource(
 *     collectionOperations={}
 * )
 */
class Status
{
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
}