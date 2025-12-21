@extends('layouts.main')

@section('content')
<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Developer Details</strong>
              </div>           
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="name" class="col-md-3 col-form-label">Name</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-white-2">{{$developer->name}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="email" class="col-md-3 col-form-label">Email</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-white-2">{{$developer->email}}</p>
                      </div>
                    </div>

                    <hr>
                    <div class="form-group row mb-0">
                      <div class="col-md-9 offset-md-3">
                          <a href="{{ route('developers.edit', $developer->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{ route('developers.delete', $developer->id)}}" class="btn btn-delete btn-outline-danger">Delete</a>
                          <a href="{{ route('developers.index')}}" class="btn btn-outline-secondary">Cancel</a>

                          <form id="delete-form" action="" method="POST", style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
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