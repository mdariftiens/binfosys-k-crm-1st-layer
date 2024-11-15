<?php

namespace App\Livewire;

use App\Models\Organization;
use Livewire\Component;

class OrganizationComponent extends Component
{
    public $organizations, $name, $address, $phone, $type, $web_url, $organization_id;

    public function render()
    {
        $this->organizations = Organization::all();
        return view('livewire.organization-component');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'web_url' => 'required',
        ]);
        Organization::create([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'type' => $this->type,
            'web_url' => $this->web_url,
            'created_by' => auth()->id(),
        ]);

        session()->flash('message', 'Organization Created Successfully.');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
        $this->phone = '';
        $this->type = '';
        $this->web_url = '';
    }

    public function organizationDelete(Organization $id)
    {
        $id->delete();
        session()->flash('success', 'Organization deleted successfully.');
        $this->redirect(route('organizations'));
    }

}
