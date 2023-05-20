<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Filament\Tables;

class UserTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected $listeners = ['refreshUserTable' => '$refresh'];

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('fullname')
                ->searchable(['title', 'first_name', 'last_name'])
                ->sortable(['title', 'first_name', 'last_name']),

            TextColumn::make('email'),

            TextColumn::make('index')
                ->placeholder('-'),

            TextColumn::make('roles.name')
                ->placeholder('-'),

            TextColumn::make('faculty.name')
                ->placeholder('-'),

            TextColumn::make('designation.designation')
                ->placeholder('-'),

            TextColumn::make('last_login')
                ->since()
                ->placeholder('-')
                ->description(fn(User $record): string => isset($record->last_login_ip) ? $record->last_login_ip : ''),

            TextColumn::make('created_at'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('edit')
                    ->url(fn(User $record): string => route('users.edit', $record))
                    ->icon('heroicon-s-pencil')
                    ->label('Edit')
                    ->color('success'),

                Action::make('delete')
                    ->action(fn(User $record) => $this->emit('confirmDeletion', ['key' => $record->id]))
                    ->icon('heroicon-s-trash')
                    ->label('Delete')
                    ->color('danger')
            ])
        ];
    }

    public function render(): string
    {
        return <<<'blade'
            <div>
                {{ $this->table }}
            </div>
        blade;
    }
}
