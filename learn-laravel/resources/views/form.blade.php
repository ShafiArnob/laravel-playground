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
      @php
        $demo = 1;
      @endphp
      <x-input type="text" name="name" label="Name" :demo="$demo"/>
      <x-input type="email" name="name" label="Email"/>
      <x-input type="password" name="password" label="Password"/>
      <x-input type="password" name="password_confirmation" label="Confirm Password"/>


      <button class="btn btn-primary">Submit</button>
    
    </form>
  </div>
  
</body>
</html>