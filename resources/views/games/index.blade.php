@extends('layouts.main')

@section('content')
    <main class="py-5">
        <div class="container custom-container">
            <div class="row">
				<div class="col-md-3">
					<div class="card card-categories">
						<div class="card-header card-title">
							<div class="d-flex align-items-start">
								<h2 class="mb-0"> Categories</h2>
                                
							</div>
						</div>
						<div class="card-body">
							<div class="p-2 category-container">
								 @foreach($categories as $category)
									<p class="nav-white">{{$category->name}} <i class="{{ isset($icons[strtolower($category->name)]) ? $icons[strtolower($category->name)] : "fa-solid fa-question" }}"></i></p>
								@endforeach
							</div>
							
						</div>
					</div>
				</div>
                <div class="col-md-9">
                    <div class="card card-trans">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">Games Catalog</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('games.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus-circle"></i> Add New</a> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <select class="custom-select">
                                                   @foreach($types as $index => $type) {
													<option value="{{$index}}">{{$type}}</option>
												   }
												   @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Player Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Developer</th>
                                </tr>
                            </thead>
                            <tbody>


                                @if ($games->count())
                                    @foreach ($games as $index => $entry)
                                        <tr class="row-detail" onclick="window.location='{{route('games.show', $entry->id)}}'" style="cursor: pointer;">
                                            <th id="image"><img width="180" height="90" src="{{ asset('storage/images/'.$entry->image_path.'_icon.jpg') }}"></th>
                                            <td>
                                                {{ $entry->name }}
                                                <br>
                                                @foreach($entry->categories as $category)
                                                    <i class="{{ isset($icons[strtolower($category->name)]) ? $icons[strtolower($category->name)] : "fa-solid fa-question" }}"></i>
                                                @endforeach
                                            </td>
											<td>{{ $entry->description }}</td><td>{{ $entry->player_type }}</td>
											<td>${{ $entry->price }}</td>
											<td>{{ $entry->developer->name }}</td>
											
                                            <!-- <td width="150">
                                                <a href="{{ route('games.show', $entry->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                        class="fa fa-eye"></i></a>
                                                 <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary"
                                                    title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-circle btn-outline-danger"
                                                    title="Delete" onclick="confirm('Are you sure?')"><i
                                                        class="fa fa-times"></i></a>
                                            </td> -->
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

{{-- @section('content')
<p>{{$games}}</p>

@foreach ($games as $index => $entry)
	@foreach ($entry->categories as $category)
    	<p>{{$category->name}}</p>
	@endforeach
@endforeach

@foreach ($types as $type) 
	<p>{{$type}}</p>
@endforeach
	
@endsection --}}