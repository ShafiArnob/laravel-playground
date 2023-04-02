<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uplaod</title>
</head>
<body>
  <form method="post" enctype="multipart/form-data" action="{{url('/upload')}}">
  @csrf
    <div>
      <p>File</p>
      <input name='image' type="file" name="" id="">
    </div>

    <button>Submit</button>
  </form>
</body>
</html>