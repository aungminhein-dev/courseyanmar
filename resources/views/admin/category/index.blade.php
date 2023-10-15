@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">

                   Category Table
                    @livewire('admin.category-search')
                    <div class="card-action">
                        <span><a href="{{ route('admin.createCategoryPage') }}" class="btn btn-light btn-block {{$categories->count() == 0 ? 'bounce' : ''}}">+Add Category</a></span>
                    </div>
                </div>
                @if ($categories->count() != 0)
                    <div class="table-responsive">
                    <table class="table align-items-center table-flush table-borderless">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Courses Count</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><a href="" class="text-primary">{{ $category->name }}</a></td>
                                    <td><img src="{{ asset('storage/' . $category->image) }}" class="product-img"
                                            alt="product img">
                                    </td>
                                    <td>{{ Str::limit($category->description, 20, '...') }}</td>
                                    <td>{{ $category->courses_count }}</td>
                                    <td>{{ $category->created_at->format('j-F-Y') }}</td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('admin.editCategory', $category->id) }}"
                                                class="btn btn-warning"><i class="fa-solid fa-pen me-2"></i> Edit</a>
                                            <a href="{{ route('admin.deleteCategory', $category->id) }}"
                                                class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <h4 class="text-warning p-2">No Categories Yet!</h4>
                @endif
            </div>
        </div>
    </div>
    <!--End Row-->
@endsection
