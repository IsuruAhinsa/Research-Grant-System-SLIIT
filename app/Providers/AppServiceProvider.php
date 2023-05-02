<?php

namespace App\Providers;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TextColumn::configureUsing(function (TextColumn $column): void {
            $column
                ->toggleable()
                ->searchable()
                ->size('sm')
                ->sortable();
        });
    }
}
