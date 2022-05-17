<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GreetUser extends Command
{
    protected $signature = 'greet {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = $this->argument('user');
        $this->info("Hello, {$user}.");
    }
}
