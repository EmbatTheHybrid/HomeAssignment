@extends('layouts.main')

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-trans">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Categories</h2>
                                <div class="ml-auto">
                                    {{-- <a href="{{ route('C.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i> Add New</a> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-body">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <select class="custom-select">
                                                    <option value="" selected>All Companies</option>
                                                    <option value="1">Company One</option>
                                                    <option value="2">Company Two</option>
                                                    <option value="3">Company Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>


                                @if ($categories->count())
                                    @foreach ($categories as $index => $entry)
                                        <tr class="row-detail">
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $entry->name }}</td>
                                            {{-- <td width="150">
                                                <a href="{{ route('categories.show', $entry->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                        class="fa fa-eye"></i></a>
                                                 <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary"
                                                    title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-circle btn-outline-danger"
                                                    title="Delete" onclick="confirm('Are you sure?')"><i
                                                        class="fa fa-times"></i></a>
                                            </td> --}}
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