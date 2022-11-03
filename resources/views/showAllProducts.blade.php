<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center ">
  <h1 >Flex product</h1>
  <div class="float-right mr-5">
    <a href="" class='btn btn-primary' data-toggle="modal" data-target="#myModal">Add New Product</a>
  </div>
</div>
  
<div class="container">
<div class="row">
    <div class="col-2">
    <div class="list-group">
  <a href="/orders" class="list-group-item list-group-item-action">Order</a>
  <a href="/products" class="list-group-item list-group-item-action">Product</a>
 </div>

    </div>
    <div class="col-10">
    
<table class="table">
    <thead>
        <tr>
            <td>product ID</td>
            <td>Adress</td>
            <td>Customer Info</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>


    <tbody>
    @foreach($products as $o)
    <tr>
            <td>{{$o->id}}</td>
            <td>{{$o->name}}</td>
            <td>{{$o->barcode}}</td>
            <td><a href="javascript:void(0)" class='btn btn-warning editBtn' >Edit</a></td>
            <!-- <td><a href="{{ url('products/productDetails', [$o->id]) }}"> Details </a></td> -->
            <td>
            <form action="products/{{$o->id}}" method='POST'>
            @csrf
            @method('DELETE')
                <input type="submit" class='btn btn-danger' value='Delete'>
            </form>
           </td>
        </tr>
    @endforeach    
    </tbody>

</table>
    </div>
</div>
 
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
      <form action="products" method='POST' id='form'>
      @csrf
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" id='name' name='name' class='form-control'>
      </div>
      <div class="form-group">
        <label for="">Barcode</label>
        <input type="text" id='barcode' name='barcode' class='form-control'>
      </div>
      <div class="form-group">
       
        <input type="submit" id='submit' name='submit' class='btn btn-success'>
      </div>
      </form>
      </div>

   

    </div>
  </div>
</div>


<script>

$('.editBtn').click(function(e){

     barcode = e.target.parentElement.previousElementSibling.innerText;
     name=e.target.parentElement.previousElementSibling.previousElementSibling.innerText;
     id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;

  $('#name').val(name);
  $('#barcode').val(barcode);
  $('#form').attr('action','products/'+id);
  $('#form').append("<input type='hidden' name='_method' value='PUT'>")

    $('#myModal').modal('show');


})


</script>

</body>
</html>
