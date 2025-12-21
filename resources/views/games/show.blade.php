@extends('layouts.main')

@section('content')
<main class="py-5">
      <div class="container  m-auto">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <div class="col-md-9">
                        <strong class="form-control-plaintext text-white"><h2>{{$game->name}}</h2></strong>
                      </div>
            <div class="card">
              <div class="card-body p-3 game">
                <div class="row">
                    <div class="col-md-8">
                        <video class="embed-responsive" controls>
                            <source src="{{asset('storage/videos/'.$game->image_path.'_video.mp4')}}" type="video/mp4">
                        </video>
                        <div class="pt-3">
                            <a href="{{ route('games.edit', $game->id)}}" class="game-btn btn btn-info">Edit</a>
                            <a href="{{ route('games.delete', $game->id)}}" class="game-btn btn btn-delete btn-outline-danger">Delete</a>
                            <a href="{{ route('games.index')}}" class="game-btn btn btn-outline-secondary">Cancel</a>

                            <form id="delete-form" action="" method="POST", style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                        </div>
                    </div>
                  <div class="col-md-4 d-flex flex-column justify-content-between p-0 px-1">
                      <div>
                        <div class="form-group">
                            <div class="col-md-12 p-0 pr-2">
                                <img width="100%" height="175" src="{{ asset('storage/images/'.$game->image_path.'_main.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="form-control-plaintext pt-0 text-white" style="font-size: 0.9rem;">{{$game->description}}</p>
                          </div> 
                        </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-muted-game">Player type</label>
                        <div class="col-md-8">
                          <p class="form-control-plaintext text-white">{{$game->player_type}}</p>
                        </div>
                        <label for="developer" class="col-md-4 col-form-label text-muted-game">Developer</label>
                        <div class="col-md-8">
                          <a href="{{route('developers.show', $game->developer_id)}}" class="form-control-plaintext info-click">{{ $game->developer->name}}</a>
                        </div>
                      </div>
                      
                    </div>
                    
                    <div class="form-group p-0 flex flex-column align-bottom">
                      <hr>
                        <label for="categories" class="col-md-4 col-form-label text-muted-game px-0">Categories</label>
                      <div class="col-md-8 px-0">
                        @foreach ($game->categories as $category)
                            <small class="game-category p-1 rounded">{{$category->name}}</small>
                        @endforeach
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	
@endsection