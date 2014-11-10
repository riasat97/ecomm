@extends('layouts.main')

@section('content')

      <div id="admin">
	 
	  <h1>Catagories Admin panel</h1><hr>

	  <p>Here you can View,Delete & create new Catagories</p>

	  <h2>Catagories</h2><hr>

	     <ul>
		 @foreach($catagories as $catagory)
		 <li>
		 	{{ $catagory->name }} - 
		 	{{ Form::open(array('url'=>'admin/catagories/destroy','class'=>'form-inline')) }}
		 	{{ Form::hidden('id', $catagory->id) }}
		 	{{ Form::submit('delete') }}
		 	{{ Form::close()  }}
		 </li>
		 @endforeach

	     </ul>
	     <h2>Create new Catagory</h2><hr>
         @if($errors->has())
         <div id="form-errors">
	       <p>The following errors have occurred:</p>
	     <ul>
		 @foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		 @endforeach
	     </ul>

         </div><!--end form-errors -->
         @endif
         {{ Form::open(array('url'=>'admin/catagories/create')) }}
         <p>
	     {{ Form::label('name') }}
	     {{ Form::text('name') }}
         </p>
         {{Form::submit('Create Catagory', array('class'=>'secondary-cart-btn')) }}
         {{ Form::close() }}
         </div><!--end admin-->


@stop