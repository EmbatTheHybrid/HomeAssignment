<div class="row">
    <div class="col-md-12">
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label">Name</label>
        <div class="col-md-9">
            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
       
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-3 col-form-label">Email</label>
        <div class="col-md-9">
            <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
             <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
    </div>

    <hr>
    <div class="form-group row mb-0">
        <div class="col-md-9 offset-md-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('developers.index')}}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </div>
    </div>
</div>