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


  
<div class="container">
<div class="row">
    <div class="col-2">
    <div class="list-group">

 </div>

    </div>
    <div class="col-10">
    
<table class="table">
    <thead>
        <tr>
            <td>Order ID</td>
            <td>Adress</td>
            <td>Customer</td>
            <td>Phone</td>
            <td>Product</td>
        </tr>
    </thead>


    <tbody>
  
    <tr>
      
            <td>{{$orders->id}}</td>
            <td>{{$orders->adress}}</td>
            <td>{{$orders->customer}}</td>
            <td>{{$orders->phone}}</td>
            <td>{{$orders->myproduct[0]->name}}</td>
            <td>
         
           </td>
        </tr>
   
    </tbody>

</table>
    </div>
</div>

  
</div>








</body>
</html>
