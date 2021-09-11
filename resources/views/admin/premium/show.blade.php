@extends('admin.admin')

@section('content')
<div class="container">
    <h1 class="text-danger">{{ $product->title }}</h1>
    <p>{!! $product->video_html !!}</p>
    <p>{{  $product->description }}</p>
    <p><img src="{{ asset('image/images/' .$product->image) }}" alt="" width="400"></p>
    <a href="{{ route('admin.premium.index') }}">Go Back</a>
</div>
@endsection