<div>
    <div class="card">
        <div class="card-header">{{ $course->name }}
            <div class="card-action">

                <form class="search-bar d-flex" role="search" method="get">
                    <input class="form-control me-2 my-input" name="searchKey" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                </form>
            </div>
        </div>
        @if ($lessons->count() != 0)
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Media</th>
                            <th>Audience Type</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->title }}</td>
                                <td>
                                    <video src="{{ asset('storage/lessons/' . $lesson->media) }}"
                                        style="width:100px"></video>
                                </td>
                                <td>{{ $lesson->audience_type == 'all_users' ? 'All User' : 'Members Only' }}</td>
                                <td>{{ $lesson->created_at->format('j-F-Y') }}</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash"></i></a>
                                    <a href="" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <h2 class="text-warning">No Lessons Yet! <a href="{{ route('admin.createLessonPage', $course->id) }}">Add
                    Here</a></h2>
        @endif
    </div>
</div>

