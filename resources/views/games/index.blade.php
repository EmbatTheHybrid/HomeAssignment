@extends('layouts.main')

@section('content')
<p>{{$games}}</p>

@foreach ($games as $index => $entry)
	@foreach ($entry->categories as $category)
    	<p>{{$category->name}}</p>
	@endforeach
@endforeach
	
@endsection