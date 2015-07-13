<?php

namespace Magick\Data\Seed;

use Storage;
use Illuminate\Database\Seeder;

abstract class MtgJsonSeeder extends Seeder implements MtgJsonReader {

    public function getJsonFilesPath()
    {
        return "/data";
    }

    public function getJsonFiles($path)
    {
        return Storage::disk('local')->files($path);
    }

    public function getJsonData($file, $associative = true)
    {
        return json_decode(Storage::disk('local')->get($file), $associative);
    }

}
