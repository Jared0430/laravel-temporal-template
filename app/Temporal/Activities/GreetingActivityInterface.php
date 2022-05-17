<?php

namespace App\Temporal\Activities;

use Temporal\Activity\ActivityInterface;
use Temporal\Activity\ActivityMethod;

#[ActivityInterface]
interface GreetingActivityInterface
{
    #[ActivityMethod]
    public function composeGreeting(string $greeting, string $name): string;
}
