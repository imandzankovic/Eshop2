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
<meta name="csrf-token" content="{{ csrf_token() }}" />
<body>

<div class="jumbotron text-center ">
  <h1 >Flex ORDER</h1>
  <div class="float-right mr-5">
    <a href="" class='btn btn-primary' data-toggle="modal" data-target="#myModal">Add New Order</a>
  </div>
</div>
  
<div class="container">
<div class="row">
    <div class="col-3">
    <div class="list-group">
  <a href="/orders" class="list-group-item list-group-item-action">Orders</a>
  <a href="/products" class="list-group-item list-group-item-action">Products</a>
 </div>
 <div class="col-5">
 <p>Input your array here:</p>
 
    <form action="javascript:void(0);" method="post">
    <input type="text" id="numbers" placeholder="Enter numbers" />
    <input type="submit" value="submit" class='btn btn-primary'/>

    <input id="regTitle" type="text" name="regTitle" placeholder="result is" disabled />
</form>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $("form").submit(function(){
        var str = $('#numbers').val();

        var arrayOfInts = str.split(',').map(Number);
        $.post('/getNumbers', { input:arrayOfInts}, 
    function(returnedData){
         document.getElementById('regTitle').value = returnedData;
        }).fail(function(){
      console.log("error");
        });
    });
</script>
    </div>
    <div class="col-10" style=" margin-left: 243px;margin-top: -285px;">
    
<table class="table">
    <thead>
        <tr>
            <td>Order ID</td>
            <td>Adress</td>
            <td>Customer Info</td>
            <td>Phone</td>
            <td>Product</td>
            <td>Edit</td>
            <td>Details</td>
            <td>Delete</td>
        </tr>
    </thead>


    <tbody>
    @foreach($orders as $o)
    <tr>
            <td>{{$o->id}}</td>
            <td>{{$o->adress}}</td>
            <td>{{$o->customer}}</td>
            <td>{{$o->phone}}</td>
            <td>{{$o->myproduct[0]->name}}</td>
            <td><a href="javascript:void(0)" class='btn btn-warning editBtn' >Edit</a></td>
            <td><a href="{{ url('orders/orderDetails', [$o->id]) }}"> Details </a></td>
            <td>
            <form action="orders/{{$o->id}}" method='POST'>
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
        <h4 class="modal-title"> Order</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
      <form action="orders" method='POST' id='form'>
      @csrf
      <div class="form-group">
        <label for="">Adress</label>
        <input type="text" id='adress' name='adress' class='form-control'>
      </div>
      <div class="form-group">
        <label for="">Customer</label>
        <input type="text" id='customer' name='customer' class='form-control'>
      </div>
      <div class="form-group">
      <div class="form-group">
        <label for="">Phone</label>
        <input type="text" id='phone' name='phone' class='form-control'>
      </div>
      <div class="form-group">
        <label for="">Products</label>
       
        <select id='product_id' name='product_id' class='form-control' multiple data-live-search="true">
        <option value="" selected disabled>Select Product</option>
            @foreach($products as $pr)
                    <option value="{{$pr->id}}">{{$pr->name}}</option>
            @endforeach
        </select>
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
  product_id = e.target.parentElement.previousElementSibling.innerText;
    phone = e.target.parentElement.previousElementSibling.previousElementSibling.innerText;
     customer = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
     adress=e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
     id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;

  $('#product_id').val(product_id);
  $('#adress').val(adress);
  $('#customer').val(customer);
  $('#phone').val(phone);
  $('#form').attr('action','orders/'+id);
  $('#form').append("<input type='hidden' name='_method' value='PUT'>")

    $('#myModal').modal('show');


})


</script>

</body>
</html>
