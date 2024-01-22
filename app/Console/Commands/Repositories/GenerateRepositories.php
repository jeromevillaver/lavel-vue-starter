<?php

namespace App\Console\Commands\Repositories;

use Illuminate\Console\Command;

class GenerateRepositories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:repositories {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Repositories for Model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseStub = $this->compileBaseTemplate();
        $interfaceStub = $this->compileInterfaceTemplate();

        $basePath = app_path('Repositories/' . $this->argument('model') . 'Repository.php');
        $interfacePath = app_path('Repositories/Contracts/' . $this->argument('model') . 'RepositoryInterface.php');

        file_put_contents($basePath, $baseStub);

        $this->info($basePath . ' was created!');

        file_put_contents($interfacePath, $interfaceStub);

        $this->info($interfacePath . ' was created!');

        return Command::SUCCESS;
    }

     protected function compileBaseTemplate(): array|bool|string
    {
        $stub = file_get_contents(app_path('Repositories/Console/repository.stub'));

        return str_replace('{{ CLASS }}', $this->argument('model'), $stub);
    }

    protected function compileInterfaceTemplate(): array|bool|string
    {
        $stub = file_get_contents(app_path('Repositories/Console/interfacerepository.stub'));

        return str_replace('{{ CLASS }}', $this->argument('model'), $stub);
    }
}
