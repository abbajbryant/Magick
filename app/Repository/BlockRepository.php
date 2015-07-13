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


    /**
     * @param array $attributes
     * @return static
     */
    public function firstOrCreate(array $attributes)
    {
        $attributes = array_only($attributes, [
            'block',
        ]);

        return $this->resource->firstOrCreate($attributes);
    }

}
