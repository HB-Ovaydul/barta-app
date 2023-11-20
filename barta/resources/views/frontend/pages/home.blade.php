
@extends('frontend.layout.app')
@section('main-content')

@include('frontend.validation.validation')

  {{-- post --}}
  @include('frontend.pages.post.post')
@endsection
