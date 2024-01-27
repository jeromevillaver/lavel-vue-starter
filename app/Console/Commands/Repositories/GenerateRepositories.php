<?php

namespace App\Console\Commands\Repositories;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

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

        // Ask the user for the type of request (admin or api)
       $requestType = $this->ask('Is this request for admin or api?', 'Admin');
       $requestType = in_array($requestType, ['Admin', 'Api']) ? $requestType : 'Admin';

        if ($requestType !== 'Admin' && $requestType !== 'Api') {
            $this->warn("Invalid input, using default value 'Admin'");
        }

        // Determine the folder path based on the selected type
        $folderPath = (strcasecmp($requestType, 'admin') === 0) ? 'Admin' : 'Api';

        // Run the make:request command
        $command = "make:request {$folderPath}/" . $this->argument('model') . 'Request';
        $this->info("Running command: $command");

        try {
            Artisan::call($command);
            $this->info("Command completed successfully!");
        } catch (\Exception $e) {
            $this->error("Command failed with error: {$e->getMessage()}");
        }

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
