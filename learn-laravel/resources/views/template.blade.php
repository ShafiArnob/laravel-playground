<h1>Blade Template</h1>

<!-- <h2>{{$name ?? "Guest"}}</h2> -->
{{-- {!! $test !!} --}}

@php
  $name = "Arnob"
@endphp

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

<!-- looping -->
<h3>FOR continue break</h3>
<div style="display:flex; margin:1rem;">
  @for ($i=1;$i<10; $i++)
    @if($i==5)
      @continue
    @endif

    @if($i==8)
      @break
    @endif

    {{$i}}
  @endfor
</div>

<h3>WHILE</h3>
<div style="display:flex; margin:1rem;">
  @php
    $i=10;
  @endphp

  @while ($i<=20)
    
    {{$i}}
    @php $i++; @endphp
  @endwhile
</div>

<h3>FOREACH</h3>
<div style="display:flex; margin:1rem;">
  @php
    $arr=[1,2,3,4,5];
  @endphp
  <select>
  @foreach ($arr as $key => $i)
    <option value="{{$key}}">{{$i}}</option>
  @endforeach
  </select>
</div>