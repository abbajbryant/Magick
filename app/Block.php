<?php

namespace Magick;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Block
 *
 * @package Magick
 */
class Block extends Model {

    /**
     * @var array
     */
    protected $fillable = [
        'block',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sets()
    {
        return $this->hasMany('Magick\Set');
    }

}
