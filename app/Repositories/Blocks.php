<?php 

namespace Magick\Repositories;

use Doctrine\ORM\EntityRepository;
use Magick\Contracts\BlockRepository;

class Blocks extends EntityRepository implements BlockRepository {

    /**
     * @param $name
     * @return mixed null|Block
     */
    public function findByName ($name)
    {
        return $this->findBy(['name' => $name]);
    }

}
