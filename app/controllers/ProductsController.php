<?php 

class ProductsController extends BaseController {

	public function __construct() {
        parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex(){

        $catagories = array();
        
        foreach (Catagory::all() as $catagory) {
            $catagories[$catagory->id] = $catagory->name;
        }
            
        

		return View::make('products.index')
		->with('products', Product::all())
        ->with('catagories',$catagories);
	}
	public function postCreate(){
         $validator = Validator::make(input::all(), Product::$rules);

         if ($validator->passes()) {
         	$product = new Product;
         	$product->catagory_id = Input::get('catagory_id');
            $product->title = Input::get('title');
            $product->description = Input::get('description');
            $product->price = Input::get('price');

            $image = Input::file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('img/products/' . $filename);
            Image::make($image->getRealPath())->resize(468, 249)->save($path);
            $product->image = 'img/products/'.$filename;
         	$product->save();

         	return Redirect::to('admin/products/index')
         	->with('message','Product created successfully...!...');
         }
         return Redirect::to('admin/products/index')
         ->with('message','Something went wrong')
         ->withErrors($validator)
         ->withInput();

	}
    public function postDestroy(){
    	$catagory = Product::find(Input::get('id'));

    	if ($product) {
            File::delete('public/'.$product->image);
    		$product->delete();
    		return Redirect::to('admin/products/index')
    		->with('message','Product Deleted successfully...!...');
    	}
    	return Redirect::to('admin/products/index')
    	->with('message','Something went wrong,please try again');
    }

    public function postToggleAvailability(){

        $product = Product::find(Input::get('id'));

        if ($product) {
            $product->availability = Input::get('availability');
            $product->save();
            return Redirect::to('admin/products/index')->with('message', 'Product Updated');
        }

        return Redirect::to('admin/products/index')->with('message', 'Invalid Product');
    }
}