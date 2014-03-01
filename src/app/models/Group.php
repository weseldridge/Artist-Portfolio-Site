<?php

class Group extends Eloquent {

    protected $table = 'groups';

    public function gallerys()
    {
    	return $this->hasMany('gallerys');
    }


}