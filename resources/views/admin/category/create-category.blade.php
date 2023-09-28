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
                            <label for="input-10">Image<span class="text-muted"> (Horizontal photos are recommended)</span></label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-round px-5 btn-block"><i class="icon-check"></i>
                                Create</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{route('admin.category')}}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Back to Category Page</a>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
