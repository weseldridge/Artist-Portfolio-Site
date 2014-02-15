<?php

class Gallery extends Eloquent {

    protected $table = 'galleries';

    public function groups()
    {
    	return $this->belongsToMany('Group');
    }

    public function items()
    {
    	return $this->belongsToMany('Item');
    }

}