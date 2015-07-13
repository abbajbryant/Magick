<?php

use Illuminate\Support\Collection;
use Magick\Data\Seed\MtgJsonSeeder;
use Magick\Repository\BlockRepository;
use Illuminate\Contracts\Filesystem\Factory;

/**
 * Class BlockSeeder
 */
class BlockSeeder extends MtgJsonSeeder
{

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
     * @param BlockRepository $repo
     */
    public function __construct(Factory $storage, BlockRepository $repo)
    {
        $this->repo     = $repo;
        $this->files    = new Collection($this->getJsonFiles($this->getJsonFilesPath()));
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
                echo "Seeding Block: {$data['block']}" . PHP_EOL;
                $this->repo->firstOrCreate($data);
            }
        }

    }

}
