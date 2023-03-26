<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <form action="{{url('/')}}/register" method="POST">
      @csrf
      <h1 class="text-center">Registration</h1>

      <div class="form-group">
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{old('name')}}">
        <span class="text-danger">
          @error('name')
            {{$message}}
          @enderror
        </span>
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input name="email" type="email" class="form-control" value="{{old('email')}}">
        <span class="text-danger">
          @error('email')
            {{$message}}
          @enderror
        </span>
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input name="password" type="password" class="form-control">
        <span class="text-danger">
          @error('password')
            {{$message}}
          @enderror
        </span>
      </div>
    
      <div class="form-group">
        <label for="">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control">
        <span class="text-danger">
          @error('password_confirmation')
            {{$message}}
          @enderror
        </span>
      </div>

      <button class="btn btn-primary">Submit</button>
    
    </form>
  </div>
  
</body>
</html>