<?php

namespace Magick\Contracts;

use Magick\Block;

interface BlockRepository {

    /**
     * @param string $name
     * @return null|Block
     */
    public function findByName($name);

    /**
     * @param array $data
     * @return Block
     */
    public function firstOrCreate(array $data);

}
