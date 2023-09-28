@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">

                    Admin List
                    <div class="card-action">
                        <form class="search-bar d-flex" role="search" method="get">
                            <input class="form-control me-2 my-input" name="searchKey" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <span><a href="{{ route('admin.addNewUserPage') }}"
                                class="btn btn-primary profile-button {{ $admins->count() == 0 ? 'bounce' : '' }}">+Add New
                                Admin</a></span>
                    </div>
                </div>
                @if ($admins->count() != 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Joined At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td><img width="50px" height="50px"
                                                src="{{ $admin->gender == 'male' ? asset('images/user-male.jpg') : asset('images/female.png') }}"
                                                class="rounded" alt="">
                                        </td>
                                        <td><a href="{{ route('admin.profile', $admin->id) }}"
                                                class="text-primary">{{ $admin->name }}</a></td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone }}</td>
                                        <td>{{ $admin->gender }}</td>
                                        <td>{{ $admin->created_at->format('j-F-Y') }}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('admin.editCategory', $admin->id) }}"
                                                    class="btn btn-warning"><i class="fa-solid fa-pen me-2"></i> Edit</a>
                                                <a href="{{ route('admin.deleteCategory', $admin->id) }}"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2 px-2">
                            {{ $admins->links() }}
                        </div>
                    </div>
                @else
                    <h4 class="text-warning p-2">No admins Yet!</h4>
                    @if (request('searchKey'))
                        <h4> <i onclick="history.back()" class="fa-solid fa-arrow-left"></i> Reust For -
                            {{ request('searchKey') }}
                        </h4>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <!--End Row-->
@endsection
