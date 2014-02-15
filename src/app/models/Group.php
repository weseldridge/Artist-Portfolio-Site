<?php

class Group extends Eloquent {

    protected $table = 'groups';

    public function gallery()
    {
    	return $this->belongsToMany('Galleries');
    }


}