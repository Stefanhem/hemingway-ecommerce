@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @foreach($images as $image)
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-8 order-md-1">
                    <img src="{{asset($image->imagePath)}}" style="width: 300px;height: 300px"/>
                    {{ Form::open(['url' => '/admin/products/images/' . $image->id, 'method' => 'POST']) }}
                    <button type="submit" class="btn btn-primary btn-md btn-block">Delete image</button>
                    {{ Form::close() }}
                </div>
            </div>
        @endforeach
    </main>
@endsection
