@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Post</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{old('title', $post->title)}}">
                            </div>

                            <div class="form-group">
                                <label for="review">Review: </label>
                                <textarea class="ckeditor form-control" name="review" id="review">{{old('review', $post->review)}}</textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="written">Written: </label>
                                <textarea class="ckeditor form-control" name="written" id="written">{{old('written', $post->written)}}</textarea>
                            </div>

                            <hr>

                            <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('.ckeditor').ckeditor();
                                });
                            </script>

                            <p>Visibility</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="public" name="visibility" class="custom-control-input" value="public"
                                @if ($post->visibility == "public")
                                    checked
                                @elseif (old('visibility') == "public")
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="public">Public</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="draft" name="visibility" class="custom-control-input" value="draft"
                                @if ($post->visibility == "draft")
                                    checked
                                @elseif (old('visibility') == "draft")
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="draft">Draft</label>
                            </div>

                            <div class="form-group">
                                <label for="gender_id">Gender</label>
                                <select class="form-control" name="gender_id" id="gender_id">
                                    @foreach ($genders as $g)
                                        <option value="{{$g->id}}"
                                            @if ($post->gender_id == $g->id)
                                                selected
                                            @endif
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
