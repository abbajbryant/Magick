<?php

namespace Magick\Contracts;

interface BlockRepository {

    /**
     * @param $name
     * @return mixed null|Block
     */
    public function findByName($name);

}
