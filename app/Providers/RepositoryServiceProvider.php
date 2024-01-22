<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\Repositories\GenerateRepositories;
use Illuminate\Support\Facades\File;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         $repositoryPath = app_path('Repositories');

         $repositoryFiles = File::files($repositoryPath);

         foreach ($repositoryFiles as $file) {
            $fileName = $file->getBasename('.php');
            $repositoryClass = $this->getRepositoryClassName($fileName);
            $interfaceClass = $this->getInterfaceClassName($fileName);

            $this->app->bind($interfaceClass, $repositoryClass);
         }

         $this->commands(GenerateRepositories::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    private function getRepositoryClassName($fileName): string
    {
        $namespace = 'App\\Repositories';

        return $namespace . '\\' . $fileName;
    }

    private function getInterfaceClassName($fileName): string
    {
        $namespace = 'App\\Repositories\\Contracts';

        return $namespace . '\\' . $fileName . 'Interface';
    }
}
