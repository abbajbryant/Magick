<?php

namespace Magick;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Card
 *
 * @ORM\Entity
 * @ORM\Table(name="cards")
 * @package Magick
 */
class Card {
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned":true})
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @var \Magick\Set
     * @ORM\ManyToOne(targetEntity="Set", inversedBy="cards")
     */
    protected $set;

    /**
     * @param \Magick\Set $set
     * @return $this
     */
    public function setSet(Set $set)
    {
        $this->set = $set;
        $set->addCard($this);
        return $this;
    }

}
