<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Enrollment;

class OrderCountBadge extends Component
{
    public $orderCount;
    public function updateOrderCount()
    {
        $this->orderCount = Enrollment::where('order_status', 'new')->count();
    }
    public function render()
    {

        return view('livewire.admin.order-count-badge');
    }
}
