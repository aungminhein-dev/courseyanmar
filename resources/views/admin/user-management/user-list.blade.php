@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">

                    User List
                    <div class="card-action">
                        <livewire:admin.user-search-bar role="user" />
                    </div>
                    <div class="card-action">
                        <span><a href="{{ route('admin.createCategoryPage') }}"
                                class="btn btn-primary profile-button d-none d-lg-block {{ $users->count() == 0 ? 'bounce' : '' }}">+Add
                                New
                                Uer</a></span>
                    </div>
                </div>
                @if ($users->count() != 0)
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
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            @if ($user->image)
                                                <img width="50px" height="50px"
                                                    src="{{ asset('storage/' . $user->image) }}" class="rounded"
                                                    alt="">
                                            @else
                                                <img width="50px" height="50px"
                                                    src="{{ $user->gender == 'male' ? asset('images/user-male.jpg') : asset('images/female.png') }}"
                                                    class="rounded" alt="">
                                            @endif
                                        </td>
                                        <td><a href="{{ route('admin.profile', $user->id) }}"
                                                class="text-primary">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->created_at->format('j-F-Y') }}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('admin.deleteUser', $user->id) }}"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2 px-2">
                            {{ $users->links() }}
                        </div>
                    </div>
                @else
                    <h4 class="text-warning p-2">No user Yet!</h4>
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
