@if(Session::has('success'))
	<div class="alert alert-success"><strong>Success: </strong>{{Session::get('success')}}</div>
@endif

@if(Session::has('info'))
	<div class="alert alert-info"><strong>Information: </strong>{{Session::get('info')}}</div>
@endif

@if(Session::has('danger'))
	<div class="alert alert-danger">{{Session::get('danger')}}</div>
@endif

@if($errors->any())
    	<div class="col-md-6 col-md-offset-3"></div>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger"><p>{{ $error }}</p></div>
        @endforeach
    
@endif