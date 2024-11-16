<?php

namespace App\Livewire;

use App\Models\Database;
use App\Models\Organization;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DatabaseComponent extends Component
{
    public $databases;
    public $organizations;
    public $organization_id, $db_d, $db_name, $db_host, $db_password, $db_port, $db_prefix;

    public function store()
    {
        $this->validate([
            'organization_id' => 'required',
            'db_d' => 'required',
            'db_name' => 'required',
            'db_host' => 'required',
            'db_password' => 'required',
            'db_port' => 'required',
            'db_prefix' => 'required',
        ]);
        Database::create([
            'organization_id' => $this->organization_id,
            'db_d' => $this->db_d,
            'db_name' => $this->db_name,
            'db_host' => $this->db_host,
            'db_password' => $this->db_password,
            'db_port' => $this->db_port,
            'db_prefix' => $this->db_prefix,
            'created_by' => Auth()->id(),
        ]);
        $dbName = $this->db_name;
        // Use raw SQL to create the database
        $result = DB::statement("CREATE DATABASE IF NOT EXISTS `$dbName`");

        // Update the database configuration dynamically
        Config::set('database.connections.dynamic', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $dbName,
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
        ]);

        // Reconnect to the new database
        DB::purge('dynamic');
        DB::reconnect('dynamic');

        // Run migrations on the new database
        Artisan::call('migrate', [
            '--database' => 'dynamic',
            '--path' => 'database/migrations/migration2'  // Replace with actual migration file path
        ]);
        if ($result){
            session()->flash('success', 'Database Created Successfully.');
            $this->resetInputFields();
        }
    }

    private function resetInputFields()
    {
        $this->organization_id = '';
        $this->db_d = '';
        $this->db_name = '';
        $this->db_host = '';
        $this->db_password = '';
        $this->db_port = '';
        $this->db_prefix = '';
    }

    public function render()
    {
        $this->organizations = Organization::all();
        $this->databases = Database::all();
        return view('livewire.database-component');
    }

    public function Delete(Database $id)
    {
        $id->delete();
        session()->flash('success', 'Database deleted successfully.');
        $this->redirect(route('databases'));
    }
}
