<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <title>Customer Data Show</title>
</head>
<body>
  <div class="container">
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
            @if($customer->staus == "1")
            Active
            @else
            Inactive
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>