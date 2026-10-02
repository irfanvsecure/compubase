<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with the course catalogue. Admins are made
     * with `php artisan admin:create`, never by a seeder, since they can sign Claude in.
     */
    public function run(): void
    {
        Artisan::call('catalog:import');
    }
}
