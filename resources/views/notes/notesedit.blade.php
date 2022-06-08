@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Notes</h4>
        </div>
        <div class="card-body" style="margin-left:20%">

            <form method="post" action="{{route('update.notes', $notes->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">

                        <select id="categoryList" class="form-control" name="category_id" required>
                            <option value="{{$notes->categoryName->id}}">{{$notes->categoryName->name}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_name')
                    <div style="width:30%;height:3% ;margin-left:35%" class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">

                        <label>Notes name</label>
                        <input type="text" value="{{$notes->name}}" name="name" class="form-control"
                               placeholder="Enter notes name">
                    </div>
                    @error('name')
                    <div style="width:30%;height:3% ;margin-left:35%" class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Notes</label>
                        <textarea name="notes"  rows="5" cols="40" class="form-control tinymce-editor"></textarea>
                    </div>
                    @error('notes')
                    <div style="width:30%;height:3% ;margin-left:35%"  class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    @error('image')
                    <div style="width:30%;height:3% ;margin-left:35%" class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 100,
            menubar: false
        });
    </script>

@endsection

