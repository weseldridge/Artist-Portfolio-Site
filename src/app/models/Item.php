<?php

class Item extends Eloquent {

    protected $table = 'items';
    protected $softDelete = true;

    public function gallery()
    {
        return $this->belongsTo('gallery');
    }

}
