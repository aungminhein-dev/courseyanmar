@extends('admin.layouts.app')
@section('content')
    <div class="row" style="min-height: 100vh;">
        <div class="col-3"></div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create a Course Category</div>
                    <hr>
                    <form action="{{ route('admin.createCategory') }}" method="post" enctype="multipart/form-data">
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
                            <img src="" alt="" class="img-fluid w-100" id="my-image">
                        </div>
                        <div class="form-group">
                            <label for="input-6">Name</label>
                            <input type="text" class="form-control" id="input-6" placeholder="Category Name"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="input-7">Description</label>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-10">Image<span class="text-muted"> (Horizontal photos are
                                    recommended)</span></label>
                            <input type="file" name="image" onchange="preview()" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5 btn-block"><i class="icon-check"></i>
                                Create</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.category') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                        Back to Category Page</a>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
@section('myScript')
    <script>
        let image = document.getElementById('my-image')
        function preview() {
            image.src = URL.createObjectURL(event.target.files[0])
        }
    </script>
@endsection
