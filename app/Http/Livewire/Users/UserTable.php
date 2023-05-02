<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Filament\Tables;
use stdClass;

class UserTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string)(
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                    $livewire->page - 1
                                ))
                        );
                    }
                ),
            TextColumn::make('name'),
            TextColumn::make('email'),
            TextColumn::make('role')
                ->getStateUsing(
                    function (User $record) {
                        foreach ($record->roles as $role) {
                            $data[] = $role->name;
                        }
                        return $data;
                    }
                ),
            TextColumn::make('last_login')
                ->since()
                ->placeholder('-')
                ->description(fn(User $record): string => isset($record->last_login_ip) ? $record->last_login_ip : ''),
            TextColumn::make('created_at'),
            TextColumn::make('updated_at'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->url(fn(User $record): string => route('users.edit', $record))
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
