<div class="d-inline">
    @if ($orderCount != 0)
    <small class="badge float-right badge-light">{{ $orderCount }}</small>

    @endif
    <script>
        setInterval(function () {
            @this.call('updateOrderCount');
        }, 500);
    </script>
</div>

