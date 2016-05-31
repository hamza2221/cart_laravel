@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>
                    <p><a href="{{url('/get_cart')}}" class="btn btn-info">View My Cart</a></p>
                    <div class="col-md-6">
                    
                <form method="post" action="{{url('/add_cart')}}">
                {{csrf_field()}}
                    <div class="fom-group @if (isset($messages) && $messages->has('name')) has-error @endif">
                        <label>Item Name</label>
                        <input type="text"  name="name" class="form-control" />
                    </div>
                    <div class="fom-group">
                        <label>Quantity</label>
                        <input type="number" name="qty" class="form-control" />
                    </div>
                    <div class="fom-group">
                        <label>Item Price</label>
                        <input type="number" name="price" class="form-control" />
                    </div>
                    <div class="fom-group" style=" margin-top: 15px;">
                        <input type="submit" class="btn btn-success" value="Add to cart" />
                    </div>
                </form>
                <form method="post" action="{{url('/saveCSV.html')}}">
                {{csrf_field()}}
                    <div class="fom-group @if (isset($messages) && $messages->has('name')) has-error @endif">
                        <label>Name</label>
                        <input type="text"  name="name" class="form-control" />
                    </div>
                    <div class="fom-group @if (isset($messages) && $messages->has('mobile')) has-error @endif">
                        <label>Mobile</label>
                        <input type="text"  name="mobile" class="form-control" />
                    </div>
                    <div class="fom-group @if (isset($messages) && $messages->has('city')) has-error @endif">
                        <label>City</label>
                        <input type="text"  name="city" class="form-control" />
                    </div>

                    
                    <div class="fom-group" style=" margin-top: 15px;">
                        <input type="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
                <form enctype="multipart/form-data"  method="post" action="{{url('/uploadImage.html')}}">
                {{csrf_field()}}
                    <div class="fom-group @if (isset($messages) && $messages->has('name')) has-error @endif">
                        <label>Upload Image</label>
                        <input type="file"  name="img" class="form-control" />
                    </div>
                    
                    
                    
                    <div class="fom-group" style=" margin-top: 15px;">
                        <input type="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
                </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
