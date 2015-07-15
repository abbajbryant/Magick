<?php 

namespace Magick\Repositories;

use Doctrine\ORM\EntityRepository;
use Magick\Contracts\CardRepository;

class Cards extends EntityRepository implements CardRepository {

}
