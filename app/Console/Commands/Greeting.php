<?php

namespace App\Console\Commands;

use App\Console\Commands\Temporal\Command;
use App\Temporal\Workflows\GreetingWorkflowInterface;
use Temporal\Client\WorkflowOptions;
use Temporal\Common\IdReusePolicy;

class Greeting extends Command
{
    protected $signature = 'greet {name}';

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
        $name = $this->argument('name');

        $workflow = $this->workflowClient->newWorkflowStub(
            GreetingWorkflowInterface::class,
            WorkflowOptions::new()
                ->withWorkflowId('subscription:' . $name)
                ->withWorkflowIdReusePolicy(IdReusePolicy::POLICY_ALLOW_DUPLICATE)
        );

        $run = $this->workflowClient->start($workflow, $name);

        $this->info($run->getExecution()->getID());

        return self::SUCCESS;
    }
}
