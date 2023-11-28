@extends('layouts.app')
@section('main-content')

  <!-- User Meta -->
  @include('profile.profile')
  <!-- / User Meta -->

  <!-- / User Create Post -->
  @include('profile.post_from')
  <!-- / User User Post -->

  <!-- / User All Post -->
  @include('profile.user_post')
  <!-- / User All Post -->
@endsection

