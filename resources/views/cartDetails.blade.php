@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>
                    <p>
                        <a href="{{url('/home')}}" class="btn btn-info">Add New Item</a>
                        <a href="{{url('/destroy_cart')}}" class="btn btn-danger">Empty Cart</a>
                    </p>
                    <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Item Price</th>
                                <th>Subtotal</th>
                                <th>...</th>

                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach($cart->content() as $row) :?>

                            <tr>
                                <td>
                                    <p><strong><?php echo $row->name;?></strong></p>
                                    <p><?php echo ($row->options->has('size') ? $row->options->size : '');?></p>
                                </td>
                                <td><input id="qty_{{$row->rowid}}" type="text" value="<?php echo $row->qty;?>"></td>
                                <td>$<?php echo $row->price;?></td>
                                <td>$<?php echo $row->subtotal;?></td>
                                <td>
                                    <button class="btn btn-success" onclick="update_cart('{{$row->rowid}}')">Update</button>
                                    <a class="btn btn-warning" href="update_cart/{{$row->rowid}}">Remove</a>
                                </td>
                           </tr>

                        <?php endforeach;?>

                        </tbody>
                    </table>
                    <p class="pull-right"> <h3>Total: {{$cart->total()}}</h3> </p>
                
                </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section("custom_scripts")
<script type="text/javascript">
    function update_cart(rowID){
        var qty=$("#qty_"+rowID).val();
        if(qty!=""){
            location.href="{{url('')}}/update_cart/"+rowID+"/"+qty; 
        }else{
            alert("minimum quantity must be 1");
            $("#qty_"+rowID).focus();
        }
    }
</script>
@endsection
