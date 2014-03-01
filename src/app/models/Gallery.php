<?php

class Gallery extends Eloquent {

    protected $table = 'galleries';

    public function items()
    {
    	return $this->hasMany('Item');
    }

    public function group()
    {
        return $this->belongsTo('Group');
    }

}