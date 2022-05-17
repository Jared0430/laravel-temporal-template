<?php

namespace App\Temporal\Workflows;

use App\Temporal\Activities\GreetingActivityInterface;
use Carbon\CarbonInterval;
use Generator;
use Temporal\Activity\ActivityOptions;
use Temporal\Workflow;

class GreetingWorkflow implements GreetingWorkflowInterface
{
    protected object $greetingActivity;

    public function __construct()
    {
        $this->greetingActivity = Workflow::newActivityStub(
            GreetingActivityInterface::class,
            ActivityOptions::new()
                ->withScheduleToCloseTimeout(CarbonInterval::seconds(2))
        );
    }

    public function greet(string $name): Generator
    {
        yield $this->greetingActivity->composeGreeting('Hello', $name);
        yield Workflow::timer(CarbonInterval::minutes(10));
        return yield $this->greetingActivity->composeGreeting('Goodbye', $name);
    }
}
