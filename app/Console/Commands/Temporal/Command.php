<?php

namespace App\Console\Commands\Temporal;

use Illuminate\Console\Command as BaseCommand;
use Temporal\Client\GRPC\ServiceClient;
use Temporal\Client\WorkflowClient;
use Temporal\Client\WorkflowClientInterface;

abstract class Command extends BaseCommand
{
    protected WorkflowClientInterface $workflowClient;

    protected function getWorkflowClient(): WorkflowClientInterface
    {
        if (!$this->workflowClient) {
            $this->workflowClient = WorkflowClient::create(ServiceClient::create('localhost:7233'));
        }

        return $this->workflowClient;
    }
}
