@extends('layouts.main')

@section('content')
	<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Add New Game</strong>
              </div>           
              <div class="card-body">
                <form action="{{ route('games.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @include('games._form')
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection