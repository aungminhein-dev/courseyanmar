<div class="card-action">
    <form class="search-bar position-relative">
        <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Enter keywords">
        <a href="javascript:void();"><i class="icon-magnifier"></i></a>
        <div class="col-md-12 position-absolute">
            <div class="list-group  me-4">
                @if (strlen($search) > 1)
                    @if ($categories->count() != 0)
                        @foreach ($categories as $category)
                            <a href="{{route('admin.editCategory',$category->id)}}"
                                class="list-item list-group-item-action border-1 p-2 border-bottom-1  bg-white text-muted">{{$category->name}}</a>
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
