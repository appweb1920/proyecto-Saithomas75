@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Post</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <input type="text" class="form-control" id="tittle" name="tittle" placeholder="tittle" value="{{old('tittle')}}">
                            </div>
                            <div class="form-group">
                                <textarea class="ckeditor form-control" name="written" id="written">{{old('written')}}</textarea>
                            </div>
                            <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('.ckeditor').ckeditor();
                                });
                            </script>
                            <hr>

                            <div class="form-group">
                                <select class="form-control" name="gender_id" id="gender_id">
                                    @foreach ($genders as $g)
                                        <option value="{{$g->id}}"
                                            >{{$g->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image: </label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
