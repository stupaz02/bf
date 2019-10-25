@extends('layouts.app')

@section('content')
    @if($discussions->count() < 1)
        <div>
            No Discussions Yet
        </div>
    @else
        @foreach ($discussions as $discussion)
            <div class="card mt-2">
                <div class="card-header bg-secondary text-light ">
                <div class="d-flex justify-content-between">
                    <div>
                            <img src="{{ Gravatar::src($discussion->author->email,40) }}" class="rounded-circle"   alt="">
                            <span class="ml-2 font-weight-bold"> {{ $discussion->author->name}}</span>
                    </div>
                    <div class="mt-2">
                    <a href="{{ route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sm">View</a>
                    </div>
                </div>
                </div>

                <div class="card-body">
                    <div class="text-center">

                        <strong >{{ strtoupper($discussion->title)}}</strong> 
                    </div>
                </div>
            </div>
        @endforeach
    @endif

  
    <div class="mt-2">
        {{$discussions->links()}}
    </div>
@endsection
