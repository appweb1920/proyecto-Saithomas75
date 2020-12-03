@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Role</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('role.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{old('name', $role->name)}}" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('slug', $role->slug)}}" readonly>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" name="description" rows="3" placeholder="Description" readonly>{{old('description', $role->description)}}</textarea>
                            </div>
                            <hr>

                            <h3>Full Access</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                                @if ($role['full-access'] == 'yes')
                                    checked
                                @elseif (old('full-access') == "yes")
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Yes</label>
                              </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"
                                @if ($role['full-access'] == 'no')
                                    checked
                                @elseif (old('full-access') == "no")
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>

                            <hr>

                            <h3>Permission List</h3>

                            @foreach ($permissions as $p)
                                <div class="custom-control custom-checkbox">
                                    <input disabled type="checkbox" class="custom-control-input" id="permission_{{$p->id}}"
                                    value="{{$p->id}}" name="permission[]"
                                    @if (is_array(old('permission')) && in_array("$p->id", old('permission')))
                                        checked
                                    @elseif (is_array($permissions_role) && in_array("$p->id", $permissions_role))
                                        checked
                                    @endif
                                    >
                                    <label class="custom-control-label" for="permission_{{$p->id}}">
                                        {{$p->id}}
                                        -
                                        {{$p->name}}
                                        <em>{{$p->description}}</em>
                                    </label>
                                </div>
                            @endforeach
                            <a class="btn btn-success" href="{{route('role.edit', $role->id)}}">Edit</a>
                            <a class="btn btn-primary" href="{{route('role.index')}}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
