<?php

namespace Magick\Data\Seed;

/**
 * Interface MtgJsonReader
 * @package Magick\Data\Seed
 */
interface MtgJsonReader
{
    /**
     * @return mixed
     */
    public function getJsonFilesPath();

    /**
     * @param $path
     * @return mixed
     */
    public function getJsonFiles($path);

    /**
     * @param $file
     * @param bool $associative
     * @return mixed
     */
    public function getJsonData($file, $associative = true);
}
