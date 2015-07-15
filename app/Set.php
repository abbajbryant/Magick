<?php 

namespace Magick;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Support\Arr;

/**
 * Class Set
 *
 * @ORM\Entity
 * @ORM\Table(name="sets")
 * @package Magick
 */
class Set {

    /**
     * @var string
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $code;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="date")
     */
    protected $releaseDate;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $border;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $type;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $onlineOnly;

    /**
     * @var \Magick\Block
     * @ORM\ManyToOne(targetEntity="Block", inversedBy="sets")
     */
    protected $block;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Card", mappedBy="set")
     */
    protected $cards;

    public function __construct()
    {
        $this->cards = new ArrayCollection();
    }

    /**
     * @param \Magick\Block $block
     * @return $this
     */
    public function setBlock(Block $block)
    {
        $this->block = $block;
        $block->addSet($this);
        return $this;
    }

    /**
     * @param \Magick\Card $card
     * @return $this
     */
    public function addCard(Card $card)
    {
        $this->cards->add($card);
        $card->setSet($this);
        return $this;
    }

}
