<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $repository = $this->argument('repository');
        $parts = explode('/', $repository);
        $repositoryName = end($parts);
        $repositoryPath = app_path('Repositories/' . implode('/', array_slice($parts, 0, -1)));

        if (!file_exists($repositoryPath)) {
            mkdir($repositoryPath, 0777, true);
        }
        $repositoryFile = $repositoryPath . '/' . $repositoryName . 'Repository.php';
        if (file_exists($repositoryFile)) {
            $this->error('Repository already exists!');
            return;
        }

        $filecontent = file_get_contents(__DIR__ . '/stubs/repository.stub');
        $filecontent = str_replace('DummyNamespace', 'App\\Repositories' . implode('\\', array_slice($parts, 0, -1)), $filecontent);
        $filecontent = str_replace('DummyClass', $repositoryName . 'Repository', $filecontent);
        file_put_contents($repositoryFile, $filecontent);
        $this->info('Repository created successfully.');
    }
}
