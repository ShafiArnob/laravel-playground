<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Trash</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Customer Trash</h1>
    <a href="{{url("/register/view")}}">
      <button>Go to View</button>
    </a>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>DOB</th>
          <th>State</th>
          <th>Country</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
          <td>{{$customer->name}}</td>
          <td>{{$customer->email}}</td>
          <td>{{$customer->gender}}</td>
          <td>{{$customer->dob}}</td>
          <td>{{$customer->state}}</td>
          <td>{{$customer->country}}</td>
          <td>
            @if($customer->status == "1")
            <p class="btn btn-success">Active</p>
            @else
            <p class="btn btn-danger">Inactive</p>
            @endif
          </td>
          <td>
            <a href="{{route('customer.force-delete', ['id' => $customer->customer_id])}}"><button class="btn btn-danger">Force Delete</button></a>
            <a href="{{route('customer.restore', ['id' => $customer->customer_id])}}"><button class="btn btn-success">Restore</button></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>