@extends('layouts.app')

@section('content') 

    <div class="card mt-2">
        @include('partials.d-header')
        <div class="card-body container-fluid">
            <div class="text-center">
                <strong >{{ strtoupper($discussion->title)}}</strong> 
            </div>
            <hr>
            <div class="container-body">
                {!! $discussion->content !!}
            </div>
        </div>
       
       
    </div>

    @foreach($discussion->replies()->paginate(3) as $reply)
        <div class="card my-2">
            <div class="card-header bg-secondary">
                <div class="d-flex justify-content-between text-white">
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
                        <textarea id="editor" name="content"></textarea>
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
    @include('partials.css')  
@endsection

@section('js')
  @include('partials.js')  
@endsection