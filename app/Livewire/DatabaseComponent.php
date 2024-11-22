<?php

namespace App\Livewire;

use App\Jobs\MigrateAndSeedJob;
use App\Models\Database;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DatabaseComponent extends Component
{
    public $databases;
    public $organizations;
    public $organization_id, $db_d, $db_name, $db_host, $db_username, $db_password, $db_port, $db_prefix, $admin_email, $admin_password;

    public function store()
    {
        $this->validate([
            'organization_id' => 'required',
            'db_d' => 'required',
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
            'db_d' => $this->db_d,
            'db_name' => $this->db_name,
            'db_host' => $this->db_host,
            'db_username' => $this->db_username,
            'db_password' => $this->db_password,
            'db_port' => $this->db_port,
            'db_prefix' => $this->db_prefix,
            'admin_email' => $this->admin_email,
            'admin_password' => bcrypt($this->admin_password),
            'created_by' => Auth()->id(),
        ]);
        User::create([
            'name' => 'abc',
            'email' => $this->admin_email,
            'password' => bcrypt($this->admin_password),
        ]);
        // Use raw SQL to create the database
        $result = DB::statement("CREATE DATABASE IF NOT EXISTS `$this->db_name`");
        MigrateAndSeedJob::dispatch($this->db_d, $this->db_username, $this->db_password, $this->db_name, $this->db_host, $this->db_port,$this->admin_email,bcrypt($this->admin_password))->onQueue('migrateAndSeed');
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
