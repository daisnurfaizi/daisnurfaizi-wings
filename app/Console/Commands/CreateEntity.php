<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CreateEntity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:entity {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new entity';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $model = $this->argument('model');
        // dd($model);
        $parts = explode('/', $model);
        $entityName = end($parts);
        $entityPath = app_path('Entity/' . implode('/', array_slice($parts, 0, -1)));
        $modelPath = 'App\\Models' . implode('\\', array_slice($parts, 0, -1)) . '\\' . $entityName;
        // dd($modelPath);
        $columns = App::make($modelPath)->getFillable();
        $fillable = "";

        foreach ($columns as $column) {
            $fillable .= "    private $" . $column . ";\n";
        }
        $valueContruct = "";
        foreach ($columns as $column) {
            $valueContruct .= "\$" . $column .  ",";
        }
        // dd($valueContruct);
        $constructor = "";
        foreach ($columns as $column) {
            $constructor .= "   \$this->" . $column . " = \$" . $column . ";\n";
        }

        // dd($constructor);
        $entityClass = str_replace(
            ['{namespace}', '{class}', '{columns}', '{constructor}', '{value}'],
            ['App\\Entity' . implode('\\', array_slice($parts, 0, -1)), $entityName . 'Entity', $fillable, $constructor, $valueContruct],
            file_get_contents(__DIR__ . '/stubs/entity.stub')
        );

        File::put($entityPath . '/' . $entityName . 'Entity.php', $entityClass);

        $this->info('Entity created successfully.');
    }
}
