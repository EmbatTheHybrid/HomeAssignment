<div class="row">
    <div class="col-md-12">
        <p>{{$errors}}</p>
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
        <label for="description" class="col-md-3 col-form-label">Description</label>
        <div class="col-md-9">
            <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror">
            @error('description')
             <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="player_type" class="col-md-3 col-form-label">Categories</label>
        <div class="col-md-9">
            @foreach($categories as $category)
                <input type="checkbox" name="categories[]" value="{{$category->id}}" id=""> {{$category->name}}<br>
            @endforeach
            {{-- <select name="player_type" id="player_type" class="form-control custom-select">
                @foreach($types as $index => $type) {
                <option {{$index == old('player_type') ? 'selected' : ''}} value="{{$index}}">{{$type}}</option>
                }
                @endforeach
            </select> --}}
        </div>
    </div>

    <div class="form-group row">
        <label for="player_type" class="col-md-3 col-form-label">Player Type</label>
        <div class="col-md-9">
            <select name="player_type" id="player_type" class="form-control custom-select">
                @foreach($types as $index => $type) {
                <option {{$index == old('player_type') ? 'selected' : ''}} value="{{$index}}">{{$type}}</option>
                }
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-md-3 col-form-label" >Price</label>
        <div class="col-md-9">
            <input type="number" name="price" id="price" value="{{old('price')}}" step=".01" class="form-control @error('price') is-invalid @enderror">
            @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="developer_id" class="col-md-3 col-form-label">Developer</label>
        <div class="col-md-9">
            <select name="developer_id" id="developer_id" class="form-control custom-select">
                @foreach($developers as $index => $developer) {
                <option {{$index == old('developer_id') ? 'selected' : ''}} value="{{$index}}">{{$developer}}</option>
                }
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="image_icon" class="col-md-3 col-form-label">Icon Image</label>
        <div class="col-md-9">
            <input type="file" accept=".jpg" name="image_icon" id="image_icon" class="form-control @error('image_icon') is-invalid @enderror">
            @error('image_icon')
             <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="image_main" class="col-md-3 col-form-label">Main Image</label>
        <div class="col-md-9">
            <input type="file" accept=".jpg" name="image_main" id="image_main" class="form-control @error('image_main') is-invalid @enderror">
            @error('image_main')
             <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="video_main" class="col-md-3 col-form-label">Main Video</label>
        <div class="col-md-9">
            <input type="file" accept=".mp4" name="video_main" id="video_main" class="form-control @error('video_main') is-invalid @enderror">
            @error('video_main')
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
            <a href="{{route('games.index')}}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </div>
    </div>
</div>