<h1>Blade Template</h1>

<h2>{{$name ?? "Guest"}}</h2>
{!! $test !!}


<!-- conditional statements  -->
@if($name=="")
  <p>Name Is Empty</p>
@elseif($name=="arnob")
  <p>Name is correct</p>
@else
  <p>Name is Incorrect</p>
@endif

@unless ($name == "Shafi")
  <p>The Name is not Shafi</p>
@endunless