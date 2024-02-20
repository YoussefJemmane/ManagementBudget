<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $selectedRole = '';
    public $searchName = '';
    public $searchCNE = '';

    public function render()
    {
        $usersQuery = User::query();

        if ($this->selectedRole) {
            $usersQuery->whereHas($this->selectedRole);
        }

        // search by name name is in User Table
        if ($this->searchName) {
            $usersQuery->where('name', 'like', '%' . $this->searchName . '%');
        }

        if ($this->selectedRole === 'students' && $this->searchCNE) {
            $usersQuery->whereHas('students', function ($query) {
                $query->where('cne', 'like', '%' . $this->searchCNE . '%');
            });
        }

        $users = $usersQuery->paginate(10);

        return view('livewire.user-table', [
            'users' => $users,
        ]);
    }
}
