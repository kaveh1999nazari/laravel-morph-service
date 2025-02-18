<?php

namespace Kaveh\LaravelMorphService\Commands;

use Illuminate\Console\Command;

class RunMigrationsCommand extends Command
{
    protected $signature = 'morph:migrate';
    protected $description = 'Run migrations for MorphService package';

    public function handle(): void
    {
        $this->info('Running migrations for MorphService...');

        $this->call('migrate', [
            '--path' => 'vendor/kaveh/morph-service/src/Migrations',
            '--force' => true
        ]);

        $this->info('MorphService migrations executed successfully.');
    }
}