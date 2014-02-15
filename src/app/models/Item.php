<?php

class Item extends Eloquent {

    protected $table = 'items';

    public function group()
    {
    	return $this->belongsToMany('Groups');
    }

}