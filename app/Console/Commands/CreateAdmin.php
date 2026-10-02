<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

/** Creates an admin, or sets a new password for one. Admins can let Claude manage the site. */
class CreateAdmin extends Command
{
    protected $signature = 'admin:create {email} {--name=Admin} {--password= : Leave out to be asked}';

    protected $description = 'Create a website admin, or change an admin\'s password';

    public function handle(): int
    {
        $email = strtolower(trim($this->argument('email')));
        $password = $this->option('password') ?: $this->secret('Password (at least 12 characters)');

        $validator = Validator::make(['email' => $email, 'password' => $password], [
            'email' => 'required|email',
            'password' => 'required|string|min:12',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::firstOrNew(['email' => $email]);
        $created = ! $user->exists;
        $user->name = $user->exists ? $user->name : $this->option('name');
        $user->password = $password;
        $user->save();

        $this->info($created ? "Admin {$email} created." : "Password of {$email} changed.");

        return self::SUCCESS;
    }
}
