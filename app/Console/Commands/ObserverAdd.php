<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ObserverAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:observer {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new observer item';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Observer';

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $routeFile = config_path('event.php');
        $model = $this->argument('name');
        $replace = [
            '{{ model }}' => Str::studly($model),
        ];

        $stub = $this->files->get($this->getStub());
        $stub = str_replace(array_keys($replace), array_values($replace), $stub);
        $content = $this->files->get($routeFile);
        $content = str_replace('// model_here', $stub, $content);

        $this->files->put($routeFile, $content);

        $this->info($this->type . ' added successfully.');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/observer.stub');
    }
}
