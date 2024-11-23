<?php

namespace App\Livewire;

use App\Jobs\MigrateAndSeedJob;
use App\Models\Database;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DatabaseComponent extends Component
{
    public $databases;
    public $organizations;
    public $organization_id, $db_driver, $db_name, $db_host, $db_username, $db_password, $db_port, $db_prefix, $admin_email, $admin_password;

    public function store()
    {
        $this->validate([
            'organization_id' => 'required',
            'db_driver' => 'required',
            'db_name' => 'required|unique:databases,db_name',
            'db_host' => 'required',
            'db_username' => 'required',
            'db_password' => 'nullable',
            'db_port' => 'required',
            'db_prefix' => 'nullable',
            'admin_email' => 'required',
            'admin_password' => 'required',
        ]);
        Database::create([
            'organization_id' => $this->organization_id,
            'db_driver' => $this->db_driver,
            'db_name' => $this->db_name,
            'db_host' => $this->db_host,
            'db_username' => $this->db_username,
            'db_password' => $this->db_password,
            'db_port' => $this->db_port,
            'db_prefix' => $this->db_prefix,
            'admin_email' => $this->admin_email,
            'admin_password' => Hash::make($this->admin_password),
            'created_by' => Auth()->id(),
        ]);
        $adminPassword = ($this->admin_password);
        User::create([
            'name' => 'abc',
            'email' => $this->admin_email,
            'password' => $adminPassword,
        ]);

        // Use raw SQL to create the database
        $result = DB::statement("CREATE DATABASE IF NOT EXISTS `$this->db_name`");


        MigrateAndSeedJob::dispatch($this->db_driver, $this->db_username, $this->db_password, $this->db_name, $this->db_host, $this->db_port,$this->admin_email,$adminPassword)->onQueue('migrateAndSeed');
//        DB::table('databases')
//            ->where('db_name', $this->db_name)
//            ->update(['migration_progress' => 'In Progress']);
//        DB::table('databases')
//            ->where('db_name', $this->db_name)
//            ->update(['seed_progress' => 'In Progress']);
        if ($result){
            session()->flash('success', 'Database created and migration/seeding started!');
            $this->resetInputFields();
        }
    }

    private function resetInputFields()
    {
        $this->organization_id = '';
        $this->db_driver = '';
        $this->db_name = '';
        $this->db_username = '';
        $this->db_host = '';
        $this->db_password = '';
        $this->db_port = '';
        $this->db_prefix = '';
        $this->admin_email = time().'arif@veefin.com';
        $this->admin_password = time().'arif@veefin.com';
    }

    public function render()
    {
        $this->db_driver = env("DB_CONNECTION");
        $this->db_name = 'arif'.time();
        $this->db_username = 'arif'.time();
        $this->db_host = env('DB_HOST');
        $this->db_password = env("DB_PASSWORD");
        $this->db_port = env("DB_PORT");
        $this->db_prefix = '';
        $this->organizations = Organization::all();
        $this->databases = Database::all();
        $this->admin_email = time().'arif@veefin.com';
        $this->admin_password = time().'arif@veefin.com';
        return view('livewire.database-component');
    }

    public function Delete(Database $id)
    {
        $id->delete();
        session()->flash('success', 'Database deleted successfully.');
        $this->redirect(route('databases'));
    }
}
