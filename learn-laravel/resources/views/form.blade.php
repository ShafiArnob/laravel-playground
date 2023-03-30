<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <form action="{{$url}}" method="POST">
      @csrf
      <h1 class="text-center">{{$title}}</h1>
      <!-- @php
        $demo = 1;
        print_r($errors->all());
      @endphp -->
      <x-input type="text" name="name" label="Name" value="{{$customer->name}}"/>
      <x-input type="email" name="email" label="Email"  value="{{$customer->email}}"/>

      <x-input type="password" name="password" label="Password" />
      <x-input type="password" name="password_confirmation" label="Confirm Password" />

      <x-input type="text" name="country" label="Country"  value="{{$customer->country}}"/>
      <x-input type="text" name="state" label="State"  value="{{$customer->state}}"/>
      <x-input type="text" name="address" label="Address"  value="{{$customer->address}}"/>
      
      <div>
        <input type="radio" id="M" name="gender" value="M" {{$customer->gender == "M" ? "checked":""}}>
        <label for="M">M</label><br>

        <input type="radio" id="F" name="gender" value="F" {{$customer->gender == "F" ? "checked":""}}>
        <label for="F">F</label><br>

        <input type="radio" id="O" name="gender" value="O" {{$customer->gender == "O" ? "checked":""}}>
        <label for="O">O</label>
      </div>

      <div>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="{{$customer->dob}}">
      </div>

      <button class="btn btn-primary">Submit</button>
    
    </form>
  </div>
  
</body>
</html>