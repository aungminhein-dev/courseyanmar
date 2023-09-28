<div class="">
    <form class="search-bar d-flex position-relative" role="search" method="get">
        <input class="form-control me-2 my-input" wire:model.live.debounce.300ms="searchKey" name="searchKey"
            type="search" placeholder="Search" aria-label="Search">
       <div class="col-md-12 position-absolute mt-4">
            <div class="list-group mt-3 me-4">
                @if (strlen($searchKey) > 1)
                    @if ($users->count() != 0)
                        @foreach ($users as $user)
                            <a href="{{route('admin.profile',$user->id)}}"
                                class="list-item list-group-item-action border-1 p-2  bg-white text-muted">{{$user->name}}</a>
                        @endforeach
                    @else
                    <span href=""
                    class="list-item list-group-item-action border-1 p-2 rounded bg-white text-muted">No Results</span>
                    @endif
                @endif
            </div>
        </div>
    </form>
</div>
