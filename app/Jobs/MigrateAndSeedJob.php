<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class MigrateAndSeedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $db_d;
    protected $db_username;
    protected $db_password;
    protected $db_name;
    protected $db_host;
    protected $db_port;
    protected $databaseName;
    /**
     * Create a new job instance.
     */
    public function __construct($db_d, $db_username, $db_password, $db_name, $db_host, $db_port)
    {
        $this->db_d = $db_d;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Configure database connection
        config(['database.connections.dynamic' => [
            'driver' => $this->db_d,
            'host' => $this->db_host,
            'port' => $this->db_port,
            'database' => $this->db_name,
            'username' => $this->db_username,
            'password' => $this->db_password,
        ]]);

        DB::purge('dynamic');
        DB::reconnect('dynamic');

        DB::setDefaultConnection('dynamic');

        // Run the migrations for the dynamic database
        Artisan::call('migrate', [
            '--database' => 'dynamic',
            '--path' => 'database/migrations/migration2',
            '--force' => true,
        ]);

        // Run the seeder for the dynamic database
        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\SecondLayerDatabaseSeeder',
            '--force' => true,
        ]);

        DB::setDefaultConnection('mysql');
        DB::purge('dynamic');

        DB::table('databases')
            ->where('db_name', $this->db_name)
            ->update(['migration_progress' => 'Complete']);
        DB::table('databases')
            ->where('db_name', $this->db_name)
            ->update(['seed_progress' => 'Complete']);
    }
}
