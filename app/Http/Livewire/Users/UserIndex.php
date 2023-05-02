<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserIndex extends Component
{
    public $user;
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
            Notification::make()
                ->title('Cannot Delete Yourself')
                ->body('We would feel really bad if you deleted yourself, please reconsider.')
                ->warning()
                ->send();
        } else {

            if ($this->forceDelete === true) {
                $user->forceDelete();
            } else {
                $user->delete();
            }

            $this->confirmingDeletion = false;
            Notification::make()
                ->title('User Deleted.')
                ->body($this->forceDelete === true ? 'The User was deleted successfully!' : 'The User moved into deleted user!')
                ->success()
                ->send();

            $this->emit('refreshUserTable');
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
