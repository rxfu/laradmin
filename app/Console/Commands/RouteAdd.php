<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class RouteAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:route {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new route item';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Route';

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
        $modelName = $this->argument('name');
        $replace = [
            '{{ model }}' => ucfirst($modelName),
            '{{ modelVariable }}' => Str::plural(Str::lower($modelName)),
        ];

        $stub = $this->files->get($this->getStub());
        $stub = str_replace(array_keys($replace), array_values($replace), $stub);


        $this->files->append(base_path('routes/web.php'), $stub);

        $this->info($modelName . ' resource routes added successfully.');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/route.stub');
    }
}