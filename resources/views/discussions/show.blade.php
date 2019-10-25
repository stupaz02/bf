@extends('layouts.app')

@section('content') 

    <div class="card mt-2">
        @include('partials.d-header')
        <div class="card-body">
            <div class="text-center">
                <strong >{{ strtoupper($discussion->title)}}</strong> 
            </div>
            <hr>
                     {!! $discussion->content !!}
        </div>
    </div>

    @foreach($discussion->replies()->paginate(3) as $reply)
        <div class="card my-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                    <img class="rounded-circle" src="{{Gravatar::src($reply->owner->email,40)}}" alt="">
                    <strong class="ml-2"> {{ $reply->owner->name}}</strong>
                </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>      
    @endforeach
        {{$discussion->replies()->paginate(3)->links()}}

    <div class="card my-4">
        <div class="card-header  bg-secondary text-light">
            Add a reply 
            
           
        </div>
        <div class="card-body">
            @auth
                <form action="{{ route('replies.store', $discussion->slug)}}" method="POST">
                   <div class="form-group">
                        @csrf
                        <input id="content" type="hidden" name="content">
                        <trix-editor input="content" name="content"></trix-editor>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-dark btn-sm">Add reply</button>
                   </div>
                </form>
            @else  
                <a href="{{route('login')}}" class="btn btn-info"> Sign in to add a reply</a>
            @endauth
        </div>
    </div>


@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection

@section('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script> 
@endsection
