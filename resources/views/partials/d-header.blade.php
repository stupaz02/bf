 <div class="card-header bg-dark text-light ">
           <div class="d-flex justify-content-between">
               <div>
                    <img src="{{ Gravatar::src($discussion->author->email,40) }}" class="rounded-circle"   alt="">
                    <strong class="ml-2"> {{ $discussion->author->name}}</strong>
               </div>
               <div class="mt-2">
               <a href="{{ route('discussions.index',$discussion->slug)}}" class="btn btn-success btn-sm">Back</a>
               </div>
           </div>
        </div>