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
  <h1 >Flex LOGIN</h1>
</div>
  
<div class="container">
<form action="login-user" method="post" id="form">
      @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      @if(Session::has('error'))
      <div class="alert alert-danger">{{Session::get('error')}}</div>
      @endif
      @csrf
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" value="{{old('email')}}" >
    <span class="text-danger">@error('email') {{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control"  placeholder="Enter password" name="password" id="password" value="{{old('password')}}">
    <span class="text-danger">@error('password') {{$message}} @enderror</span>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" id='loginBtn' class="btn btn-primary">Submit</button>
</form>
</div>

</div>
</body>
</html>
