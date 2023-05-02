<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserIndex extends Component
{
    public $user;

    public $isOpen = false;

    public $confirmingDeletion = false;

    public $forceDelete = false;

    protected $listeners = [
        'confirmDeletion',
    ];

    /**
     * Show delete confirmation modal
     * @param User $user
     */
    public function confirmDeletion(User $user)
    {
        $this->confirmingDeletion = $user->id;
    }

    /**
     * Deleting the user.
     * @param User $user
     */
    public function delete(User $user)
    {
        // First, check if we are not trying to delete ourselves
        if ($user->id === Auth::id()) {
            $this->confirmingDeletion = false;
//            $this->notification()->error(
//                'Cannot Delete Yourself',
//                'We would feel really bad if you deleted yourself, please reconsider.'
//            );
        } else {

            if ($this->forceDelete === true) {
                $user->forceDelete();
            } else {
                $user->delete();
            }

            $this->confirmingDeletion = false;
            $this->emit('eventRefresh');
//            $this->notification()->success(
//                'User Deleted.',
//                $this->forceDelete === true ? 'The User was deleted successfully!' : 'The User moved into deleted user!'
//            );

        }

        if ($this->forceDelete === true) {
            $this->forceDelete = false;
        }
    }

    public function render(): View
    {
        return view('users.user-index');
    }
}
