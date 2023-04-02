<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CreateBuilder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:builder {builder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new builder';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $model = $this->argument('builder');
        // dd($model);
        $parts = explode('/', $model);
        $builderName = end($parts);
        $builderPath = app_path('Builder/' . implode('/', array_slice($parts, 0, -1)));
        $modelPath = 'App\\Models' . implode('\\', array_slice($parts, 0, -1)) . '\\' . $builderName;
        // dd($modelPath);
        $columns = App::make($modelPath)->getFillable();
        $fillable = "";
        foreach ($columns as $column) {
            $fillable .= "    private $" . $column . ";\n";
        }

        $buliderClass = str_replace(
            ['{namespace}', '{class}', '{columns}'],
            ['App\\Builder' . implode('\\', array_slice($parts, 0, -1)), $builderName . 'Builder', $fillable],
            file_get_contents(__DIR__ . '/stubs/builder.stub')
        );
        File::put($builderPath . '/' . $builderName . 'Builder.php', $buliderClass);
        $this->info('Builder created successfully.');
    }
}
