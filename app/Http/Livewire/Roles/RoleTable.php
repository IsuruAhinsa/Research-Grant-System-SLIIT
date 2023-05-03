<?php

namespace App\Http\Livewire\Roles;

use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Component;
use Filament\Tables;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Role::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('Role Name'),

            TagsColumn::make('permissions')
                ->separator(' ')
                ->getStateUsing(
                    function (Role $record) {
                        $data = array();
                        if ($record->name == 'Super Administrator') {
                            foreach (Permission::all() as $permission) {
                                $data[] = ucwords(Str::replaceFirst('.', ' ', $permission->name));
                            }
                        } else {
                            foreach ($record->permissions as $permission) {
                                $data[] = ucwords(Str::replaceFirst('.', ' ', $permission->name));
                            }
                        }

                        return $data;
                    }
                ),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('edit')
                    ->url(fn(Role $record): string => route('roles.edit', $record))
                    ->icon('heroicon-s-pencil')
                    ->label('Edit')
                    ->color('primary'),
                DeleteAction::make()->modalButton('Delete')
                ->before(function (DeleteAction $action, Role $record) {
                    if ($record->name == 'Super Administrator') {
                        Notification::make()
                            ->title('Unauthorized!!')
                            ->body('Sorry! Can\'t delete super administrator permissions.')
                            ->warning()
                            ->send();
                        $action->cancel();
                    }
                })
            ])
        ];
    }

    public function render()
    {
        return <<<'blade'
            <div>
                {{ $this->table }}
            </div>
        blade;
    }
}
