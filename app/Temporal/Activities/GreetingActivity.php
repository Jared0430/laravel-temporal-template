<?php

namespace App\Temporal\Activities;

class GreetingActivity implements GreetingActivityInterface
{
    public function composeGreeting(string $greeting, string $name): string
    {
        return "{$greeting}, {$name}.";
    }
}
