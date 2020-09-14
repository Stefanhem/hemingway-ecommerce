@extends('layouts.app')
@section('title', $typeName)
@section('content')
<div class="proizvodi special-section" style="padding-top:10px;min-height: 600px">
  @if (isset($name))
  <h1 class="heading">{{$name}}</h1>
  @endif
  @if($chunks->count() > 0)
  @foreach($chunks as $chunk)
  <div class="proizvodi-div">
    @each('partials.product', $chunk, 'product')
  </div>
  @endforeach
  @else
  <div class="w-dyn-empty">
    <div>No items found.</div>
  </div>
  @endif
  @if($count > 1)
  <div class="pagination">
    @for($i=1; $i <= $count; $i++) <a href="/search?page={{$i}}&name={{$name}}">{{$i}}</a>
      @endfor
  </div>
  @endif
</div>

@endsection