@extends('admin.layouts.app')
@section('content')
    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Edit Course Details</div>
                    <hr>
                     <div class="row p-2">
                        <img src="{{asset('storage/'.$course->image)}}" id="my-image" class="img-fluid rounded d-block mx-auto" style="height: 500px;object-fit:cover;">
                    </div>
                    <form action="{{ route('admin.updateCourse') }}" method="post" enctype="multipart/form-data">
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
                            <label for="input-10">Image</label>
                            <input type="file" name="image" onchange="preview()" class="form-control">
                        </div>
                        <input type="hidden" name="id" value="{{$course->id}}">
                        <div class="form-group">
                            <label for="input-6">Course Name</label>
                            <input type="text" class="form-control "
                                placeholder="Course Name" name="name" value="{{old('name',$course->name)}}">
                        </div>

                        <div class="form-group">
                            <label for="input-7">Description</label>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$course->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-7">Category</label>
                            <div class="position-relative has-icon-right">

                                <div class="form-line">
                                    <select class="form-control " name="categoryId" >
                                        <option value="" selected>Select Category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}" @if($c->id == $course->category_id) selected @endif>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-7">Instructor</label>
                            <input type="text" class="form-control " id="input-7"
                                placeholder="Instructor" name="instructor" value="{{old('instructor',$course->instructor)}}">
                        </div>

                        <div class="form-group">
                            <label for="input-7">Duration</label>
                            <input type="text" class="form-control " id="input-7"
                                placeholder="Duration" name="duration" value="{{old('duration',$course->duration)}}">
                        </div>

                        <div class="form-group">
                            <label for="input-7">Price</label>
                            <input type="text" class="form-control " id="input-7"
                                placeholder="Price" name="price" value="{{old('price',$course->price)}}">
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5 btn-block"><i class="icon-check"></i>
                                Update</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    Creating an awesome Course!
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myScript')
    <script>
        let frame = document.getElementById('my-image')
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
