<?php

namespace Magick\Data\Seed;

use Storage;
use Illuminate\Database\Seeder;

abstract class MtgJsonSeeder extends Seeder implements MtgJsonReader {

    public function getJsonFiles()
    {
        return Storage::disk('json')->files();
    }

    public function getJsonData($file, $associative = true)
    {
        return json_decode(Storage::disk('json')->get($file), $associative);
    }

}
