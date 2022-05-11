<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class HashPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:hash {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash password';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Hashed password is " . Hash::make($this->argument('password')));
        return 0;
    }
}
