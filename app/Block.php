<?php

namespace Magick;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Block
 *
 * @ORM\Entity
 * @ORM\Table(name="blocks")
 * @package Magick
 */
class Block {

    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Set", mappedBy="block")
     */
    public $sets;

    public function __construct()
    {
        $this->sets = new ArrayCollection();
    }

    /**
     * @param \Magick\Set $set
     * @return $this
     */
    public function addSet(Set $set)
    {
        $this->sets->add($set);
        $set->setBlock($this);
        return $this;
    }

}
