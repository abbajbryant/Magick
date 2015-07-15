<?php

use Magick\Block;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Magick\Contracts\BlockRepository;
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
     * @var \Magick\Repositories\Blocks
     */
    protected $blocks;

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

    public function __construct(EntityManagerInterface $em, BlockRepository $blocks)
    {
        $this->em = $em;
        $this->blocks = $blocks;
        $this->files = new Collection(File::files(app_path()."/json"));
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->files->each(function($file){
            $this->storeBlock($this->pluckData($file), $this);
        });
    }

    /**
     * @param $data
     */
    private function storeBlock($data)
    {
        if (!is_null($data['block'])) {
            $block = $this->blocks->findByName($data['block']);
            if (!$block) {
                $block = new Block();
                $block->name = $data['block'];
                $this->em->persist($block);
                $this->em->flush();
            }
        }
    }

    /**
     * @param string $file
     * @return array
     */
    private function pluckData($file)
    {
        $data = json_decode(File::get($file), true);
        return array_merge(
            self::$defaultMapping,
            array_only($data, self::$jsonKeys)
        );
    }

}
