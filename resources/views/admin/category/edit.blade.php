@extends('admin.layouts.app')
@section('content')
    <div class="row" style="min-height: 100vh;">
        <div class="col-3"></div>
        <div class="col-lg-6">
            <div class="card">

                <div class="card-body">
                     <div class="card-title">Edit Category</div>
                <hr>
                    <div class="row p-2">
                        <img src="{{asset('storage/'.$chosenItem->image)}}" alt="" class="img-fluid rounded d-block mx-auto" id="my-image">
                    </div>
                    <form action="{{ route('admin.updateCategory') }}" method="post" enctype="multipart/form-data">
                        @if ($errors->any())
                            <div class="alert bg-light form-group py-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <input type="hidden" name="id" value="{{$chosenItem->id}}">
                        <div class="form-group">
                            <label for="input-6">Name</label>
                            <input type="text" class="form-control" id="input-6" placeholder="Category Name"
                                name="name" value="{{old('name',$chosenItem->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="input-7">Description</label>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('name',$chosenItem->description)}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-10">Image <span class="text-muted">(Horizontal photos are recommended)</span></label>
                            <input type="file" onchange="preview()" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5 btn-block"><i class="icon-check"></i>
                                Update</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{route('admin.category')}}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Back to Courses Page</a>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
@section('myScript')
<script>
        let frame = document.getElementById('my-image')
        function preview(){
            frame.src = URL.createObjectURL(event.target.files[0])
        }
</script>
@endsection
