<?php

namespace Magick\Repository;

use Magick\Block;

/**
 * Class BlockRepository
 * @package Magick\Repository
 */
class BlockRepository {

    /**
     * @var Block
     */
    protected $resource;

    /**
     * @param Block $resource
     */
    public function __construct(Block $resource)
    {
        $this->resource = $resource;
    }

}
