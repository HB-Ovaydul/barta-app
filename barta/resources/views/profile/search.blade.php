@extends('layouts.app');

@section('main-content')
    @foreach ($userSearch as $search)
        <div class="flex flex-shrink-0 bg-slate-200 rounded-md shadow-md">
            <div>
                <a href="{{ route('my.profile', $search->id) }}"><img class="w-20 h-20 rounded-full object-cover" src="{{ asset('storage/'.$search->photo) }}" alt=""></a>
            </div>
            <div class="ms-4 my-4">
             <h4><a href="{{ route('my.profile', $search->id) }}">{{ $search->name }}</a></h4>
            <h6>{{ '@'.$search->username }}</h6>
            </div>
        </div>
    @endforeach
@endsection



