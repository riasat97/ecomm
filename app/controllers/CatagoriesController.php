<?php 

class CatagoriesController extends BaseController {

	public function __construct() {

        parent::__construct(); 
		$this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('admin');
	}

	public function getIndex(){

		return View::make('catagories.index')
		->with('catagories', Catagory::all());
	}
	public function postCreate(){
         $validator = Validator::make(input::all(), Catagory::$rules);

         if ($validator->passes()) {
         	$catagory = new Catagory;
         	$catagory->name = Input::get('name');
         	$catagory->save();

         	return Redirect::to('admin/catagories/index')
         	->with('message','Catagory created successfully...!...');
         }
         return Redirect::to('admin/catagories/index')
         ->with('message','Something went wrong')
         ->withErrors($validator)
         ->withInput();

	}
    public function postDestroy(){
    	$catagory = Catagory::find(Input::get('id'));

    	if ($catagory) {
    		$catagory->delete();
    		return Redirect::to('admin/catagories/index')
    		->with('message','Catagory Deleted successfully...!...');
    	}
    	return Redirect::to('admin/catagories/index')
    	->with('message','Something went wrong,try again');
    }
}