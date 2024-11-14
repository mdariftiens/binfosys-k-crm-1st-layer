<?php

namespace App\Livewire;

use App\Models\Database;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DatabaseEdit extends Component
{
    public $organizations;
    public $database;
    public $organization_id, $db_d, $db_name, $db_host, $db_password, $db_port, $db_prefix;

    public function mount(Database $id)
    {
        $this->database = $id;
        $this->organization_id = $id->organization_id;
        $this->db_d = $id->db_d;
        $this->db_name = $id->db_name;
        $this->db_host = $id->db_host;
        $this->db_password = $id->db_password;
        $this->db_port = $id->db_port;
        $this->db_prefix = $id->db_prefix;
    }

    public function update(Database $id)
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
        $this->database->update([
            'organization_id' => $this->organization_id,
            'db_d' => $this->db_d,
            'db_name' => $this->db_name,
            'db_host' => $this->db_host,
            'db_password' => $this->db_password,
            'db_port' => $this->db_port,
            'db_prefix' => $this->db_prefix,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Database updated Successfully.');
        $this->redirect(route('databases'));
    }

    public function render()
    {
        $this->organizations = Organization::all();
        return view('livewire.database-edit');
    }
}
