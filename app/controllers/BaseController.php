<?php

class BaseController extends Controller {

	public function __construct() {

		    $this->beforeFilter(function() {
			View::share('catnav', Catagory::all());
		});
	}


	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
