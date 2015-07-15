<?php 

namespace Magick\Repositories;

use Doctrine\ORM\EntityRepository;
use Magick\Block;
use Magick\Contracts\BlockRepository;

class Blocks extends EntityRepository implements BlockRepository {

    /**
     * @param $name
     * @return mixed null|Block
     */
    public function findByName($name)
    {
        return $this->findBy(['name' => $name]);
    }

    /**
     * @param array $data
     * @return Block
     */
    public function firstOrCreate(array $data)
    {
        $block = $this->findOneBy($data);
        if(!$block)
        {
            $block = new Block($data);
        }
        return $block;
    }

}
