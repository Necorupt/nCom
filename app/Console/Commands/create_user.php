<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class create_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create_user {name} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create admin user {name} {password}';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('name') . '@admin.ru',
            'password' => Hash::make($this->argument('password')),
        ]);
    }
}
