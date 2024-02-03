
@extends('layouts.app')
@section('main-content')
<h1>{{ Auth::user()->name }}</h1>

  @include('frontend.pages.post.post')
@endsection
