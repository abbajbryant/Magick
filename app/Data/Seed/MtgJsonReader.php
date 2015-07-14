<?php

namespace Magick\Data\Seed;

/**
 * Interface MtgJsonReader
 * @package Magick\Data\Seed
 */
interface MtgJsonReader {

    /**
     * @return mixed
     */
    public function getJsonFiles();

    /**
     * @param $file
     * @param bool $associative
     * @return mixed
     */
    public function getJsonData($file, $associative = true);

}
