<?php

namespace Magick;

use Illuminate\Database\Eloquent\Model;

class Set extends Model {

    protected $fillable = [
        'set',
    ];

    public function block()
    {
        return $this->belongsTo('Magick\Block');
    }

}
