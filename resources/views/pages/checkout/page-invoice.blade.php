@extends('layouts.app')
@section('title', 'Narudžbina')
@section('content')
    @include('pages.checkout.invoice', $data)
@endsection
