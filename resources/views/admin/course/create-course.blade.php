@extends('admin.layouts.app')
@section('content')
    <div class="row" style="min-height: 100vh;">
        <div class="col-3"></div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create a Course</div>
                    <hr>
                    <form action="{{ route('admin.createCourse') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert bg-light form-group py-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="input-6">Course Name</label>
                            <input type="text" class="form-control " id="input-6" placeholder="Course Name"
                                name="name">
                        </div>

                        <div class="form-group">
                            <label for="input-7">Description</label>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-7">Category</label>
                            <div class="position-relative has-icon-right">

                                <div class="form-line">
                                    <select class="form-control " name="categoryId">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-7">Instructor</label>
                            <input type="text" class="form-control " id="input-7" placeholder="Instructor"
                                name="instructor">
                        </div>

                        <div class="form-group">
                            <label for="input-7">Duration</label>
                            <input type="text" class="form-control " id="input-7" placeholder="Duration"
                                name="duration">
                        </div>

                        <div class="form-group">
                            <label for="input-7">Price</label>
                            <input type="text" class="form-control " id="input-7" placeholder="Price" name="price">
                        </div>

                        <div class="form-group">
                            <label for="input-10">Image</label>
                            <input type="file" name="image" class="form-control ">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5 btn-block"><i class="icon-check"></i>
                                Create</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    Creating an awesome Course!
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
