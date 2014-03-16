<?php

class Group extends Eloquent {

    protected $table = 'groups';
    protected $softDelete = true;

    public function gallerys()
    {
    	return $this->hasMany('gallerys');
    }


}
