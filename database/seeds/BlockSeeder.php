<?php

use Magick\Block;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class BlockSeeder
 */
class BlockSeeder extends Seeder {
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    protected $em;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $files;

    /**
     * @var array
     * @static
     */
    protected static $defaultMapping = [
        'block' => null,
    ];

    /**
     * @var array
     * @static
     */
    protected static $jsonKeys = [
        'block',
    ];

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->files = new Collection(File::files(app_path()."/json"));
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->files->each(function($file){
            $data = $this->pluckData(json_decode(File::get($file), true));
            if(!is_null($data['block']))
            {
                $block = new Block();
                $block->name = $data['block'];

                $this->em->persist($block);
            }
        });
        $this->em->flush();
    }

    /**
     * @param array $data
     * @return array
     */
    private function pluckData(array $data)
    {
        return array_merge(
            self::$defaultMapping,
            array_only($data, self::$jsonKeys)
        );
    }

}
