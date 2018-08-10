<?php
namespace harigokhe\LaravelRoles;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LaravelRoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishMigrations(); 
        $this->getPublishSeed();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
          $this->mergeConfig();  
    }

     private function mergeConfig()
    {
         $path = $this->getConfigPath();
        $this->mergeConfigFrom($path, 'roles');
    }

    private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([$path => config_path('roles.php')], 'config');
    }

    private function publishMigrations()
    {
        $path = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'migrations');
    }

    private function getConfigPath()
    {
        return __DIR__ . '/../config/roles.php';
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/../migrations/';
    }

    private function getTableSeedPath()
    {
        return __DIR__ . '/../seeds/';
    }

    private function getPublishSeed()
    {
        $seedPath = $this->getTableSeedPath();
        $this->publishes([$seedPath => database_path('/seeds')], 'seeds'); 
    }
}
