<?php

namespace App\Console\Commands\Temporal;

use App\Temporal\Activities\GreetingActivity;
use App\Temporal\Workflows\GreetingWorkflow;
use Illuminate\Console\Command;
use Temporal\WorkerFactory;

class Init extends Command
{
    protected $signature = 'temporal:init';
    protected $description = 'Initialise Temporal';

    public function handle()
    {
        $factory = WorkerFactory::create();
        $worker = $factory->newWorker();

        $worker->registerWorkflowTypes(GreetingWorkflow::class);
        $worker->registerActivity(GreetingActivity::class);

        $factory->run();
    }
}
