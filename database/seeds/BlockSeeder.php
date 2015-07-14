<?php

use Magick\Block;
use Illuminate\Support\Collection;
use Magick\Data\Seed\MtgJsonSeeder;
use Illuminate\Contracts\Filesystem\Factory;

/**
 * Class BlockSeeder
 */
class BlockSeeder extends MtgJsonSeeder {

    /**
     * @var BlockRepository
     */
    protected $repo;

    /**
     * @var Collection
     */
    protected $files;

    /**
     * @param Factory $storage
     */
    public function __construct(Factory $storage)
    {
        $this->files    = new Collection($this->getJsonFiles());
    }

    /**
     * Seed our blocks.
     *
     * @return void
     */
    public function run()
    {
        foreach( $this->files as $file)
        {
            $data = $this->getJsonData($file);

            if(array_key_exists('block', $data))
            {
                Block::firstOrCreate(array_only($data, 'block'));
            }
        }

    }

}
