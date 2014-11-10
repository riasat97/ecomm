<?php

class Product extends Eloquent {

	protected $fillable = array('catagory_id','title','description','price','availability','image');

	public static $rules = array(
		'catagory_id'=> 'required|integer',
		'title'=>'required|min:2',
		'description'=>'required|min:5',
		'price'=> 'required|numeric',
		'availability'=>'integer',
		'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
		);

	public function catagory() {

        return $this->belongsTo('Catagory');
	}
}