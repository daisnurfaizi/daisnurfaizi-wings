<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $service = $this->argument('service');
        $parts = explode('/', $service);
        $serviceName = end($parts);
        $servicePath = app_path('Services/' . implode('/', array_slice($parts, 0, -1)));

        if (!file_exists($servicePath)) {
            mkdir($servicePath, 0777, true);
        }
        $serviceFile = $servicePath . '/' . $serviceName . 'Service.php';
        if (file_exists($serviceFile)) {
            $this->error('Service already exists!');
            return;
        }

        $filecontent = file_get_contents(__DIR__ . '/stubs/service.stub');
        $filecontent = str_replace('DummyNamespace', 'App\\Services' . implode('\\', array_slice($parts, 0, -1)), $filecontent);
        $filecontent = str_replace('DummyClass', $serviceName . 'Service', $filecontent);
        file_put_contents($serviceFile, $filecontent);
        $this->info('Service created successfully.');
    }
}
