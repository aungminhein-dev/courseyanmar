<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
class UserSearchBar extends Component
{
    public $searchKey;
    public $users;
    public $role;


    public function render()
    {

        if(strlen($this->searchKey) > 1){
            $this->users = User::where('role',$this->role)->where('name','like','%'.$this->searchKey.'%')->limit(5)->get();
        }
        return view('livewire.admin.user-search-bar');
    }
}
