@extends('layouts.app')

@section('content')

        <div class="card mt-3">
         {{-- <div class="card-header bg-dark  text-light">Add Discussion</div> --}} 

         <div class="card-header bg-secondary text-light ">
                <div class="d-flex justify-content-between">
                    <div>
                        Add Discussion
                    </div>
                    <div class="mt-2">
                    <a href="{{ route('discussions.index')}}" class="btn btn-dark btn-sm">Back</a>
                    </div>
                </div>
             </div>

         

        <div class="card-body">
            <form action="{{route('discussions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value=""  autocomplete="off">

                    </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    {{-- <input id="content" type="hidden" name="content">
                    <trix-editor class="trix-content" input="content"></trix-editor> --}}
                    <textarea id="editor" name="content"></textarea>
                   
                </div>
                <div class="form-group">
                    <label for="channel">Channel</label>
                    <select name="channel" id="channel" class="form-control">
                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id}}">{{ strtoupper($channel->name)}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-dark btn-sm">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('css')
    @include('partials.css')  
@endsection

@section('js')
  @include('partials.js')  
@endsection
