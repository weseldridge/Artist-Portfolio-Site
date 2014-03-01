<?php

class Item extends Eloquent {

    protected $table = 'items';

    public function gallery()
    {
        return $this->belongsTo('gallery');
    }

}