@extends('layouts.main')

@section('content')
<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <div class="col-md-9">
                        <strong class="form-control-plaintext"><h2>{{$game->name}}</h2></strong>
                      </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <video class="embed-responsive" controls>
                            <source src="{{asset('storage/videos/'.$game->image_path.'_video.mp4')}}" type="video/mp4">
                        </video>
                        <div class="pt-3">
                            <a href="#" class="game-btn btn btn-info">Edit</a>
                            <a href="{{ route('games.delete', $game->id)}}" class="game-btn btn btn-delete btn-outline-danger">Delete</a>
                            <a href="{{ route('games.index')}}" class="game-btn btn btn-outline-secondary">Cancel</a>

                            <form id="delete-form" action="" method="POST", style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                        </div>
                    </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <img width="100%" height="175" src="{{ asset('storage/images/'.$game->image_path.'_main.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-9">
                        <p class="form-control-plaintext" style="font-size: 0.9rem;">{{$game->description}}Experience the wonders of men</p>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-muted">Player type</label>
                      <div class="col-md-8">
                        <p class="form-control-plaintext">{{$game->player_type}}</p>
                      </div>
                      <label for="developer" class="col-md-4 col-form-label text-muted">Developer</label>
                      <div class="col-md-8">
                        <p class="form-control-plaintext">{{ $game->developer->name}}</p>
                      </div>
                    </div>

                    <div class="form-group row flex-column align-bottom">
                        <label for="categories" class="col-md-4 col-form-label text-muted">Categories</label>
                      <div class="col-md-8">
                        @foreach ($game->categories as $category)
                            <small class="game-category p-1 rounded">{{$category->name}}</small>
                        @endforeach
                      </div>
                    </div>

                    <hr>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	
@endsection