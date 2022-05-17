# Laravel 9 - Temporal Integration Template

This repo stands as a starter template for using [Temporal](https://temporal.io/) with [Laravel 9](https://laravel.com/)

## Prerequisites

- Download and run Temporal server with Docker

```bash
git clone https://github.com/temporalio/docker-compose.git temporal
cd temporal
docker-compose up
```

- Install the [gRPC PHP extension](https://cloud.google.com/php/grpc)

## Installation

- Clone this repo or use the "Use this template" button

- Install Composer dependencies

```bash
composer install
```

- Generate the RoadRunner binary

```bash
./vendor/bin/rr get-binary
```

- Run RoadRunner

```bash
./rr serve
```

## Running the example command

While RoadRunning is running, in another terminal, run

```bash
php artisan greet "Your Name"
```
