<?php 

namespace Magick;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class FailedJobs
 *
 * @ORM\Entity
 * @ORM\Table(name="failed_jobs")
 * @package Magick
 */
class FailedJobs {

    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $connection;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $queue;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $payload;

    /**
     * @var string
     * @ORM\Column(type="datetime")
     */
    protected $failedAt;

}
