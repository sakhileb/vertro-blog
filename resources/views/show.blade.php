@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <img class="card-img-top" src="{{ asset('images/'.$post->image_path) }}" alt="Card image" style="width:100%">
            <div class="card-body">
                <h2 class="card-title">Title: {{ $post->title }}</h2>
                <h4 class="card-title">Post by: {{ $post->user->name }}</h4>
                <p class="card-text">{{ $post->description }}</p>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <p class="lead">
                            {{ $error }}
                        </p>
                    </div>
                @endforeach
            @endif

            <form class="py-2 px-4" action="{{route('review.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                   @csrf
                   <input type="hidden" name="post_id" value="{{$post->id}}">
                   <div class="row justify-content-end mb-1">
                      <div class="col-sm-8 float-right">
                         @if(Session::has('flash_msg_success'))
                         <div class="alert alert-success alert-dismissible p-2">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {!! session('flash_msg_success')!!}.
                         </div>
                         @endif
                      </div>
                   </div>
                   <p class="font-weight-bold ">Review</p>
                   <div class="form-group row">
                      <div class=" col-sm-6">
                         <input class="form-control" type="text" name="name" placeholder="Name" maxlength="40" required/>
                      </div>
                      <div class="col-sm-6">
                         <input class="form-control" type="email" name="email" placeholder="Email" maxlength="80" required/>
                      </div>
                   </div>
                   <div class="form-group row">
                      <div class="col-sm-6">
                         <input class="form-control" type="text" name="phone" placeholder="Phone" maxlength="40" required/>
                      </div>
                      <div class="col-sm-6">
                         <div class="rate">
                            <label for="star1" title="text">
                                <span class="glyphicon glyphicon-star-empty"></span>
                                <input type="radio" checked id="star1" class="rate" name="rating" value="1"/>
                            </label>
                            <label for="star2" title="text">
                                <span class="glyphicon glyphicon-star-empty"></span>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                            </label>
                            <label for="star3" title="text">
                                <span class="glyphicon glyphicon-star-empty"></span>
                                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                            </label>
                            <label for="star4" title="text">
                                <span class="glyphicon glyphicon-star-empty"></span>
                                <input type="radio" id="star4" class="rate" name="rating" value="4"/>
                            </label>
                            <label for="star5" title="text">
                                <span class="glyphicon glyphicon-star-empty"></span>
                                <input type="radio" id="star5" class="rate" name="rating" value="5" />
                            </label>
                         </div>
                      </div>
                   </div>
                   <div class="form-group row mt-4">
                      <div class="col-sm-12 ">
                         <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                      </div>
                   </div>
                   <div class="mt-3 ">
                      <button class="btn btn-sm py-2 px-3 btn-info">Submit
                      </button>
                   </div>
            </form>
        </div>
        <div class="col-md-8 mb-3">
            <h3>Reviews</h3>
            @if(!empty($reviews))
                @foreach($reviews as $review)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->name }}</h5>
                            <p class="card-text">{{ $review->comments }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
