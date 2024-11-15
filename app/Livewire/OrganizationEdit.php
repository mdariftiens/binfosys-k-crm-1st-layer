<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Organization;

class OrganizationEdit extends Component
{
    public $organization;
    public $id, $name, $address, $phone, $type, $web_url;

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
        'type' => 'required|in:individual,company',
        'web_url' => 'nullable|url',
    ];

    public function mount(Organization $id)
    {
        $this->organization = $id;
        $this->name = $id->name;
        $this->address = $id->address;
        $this->phone = $id->phone;
        $this->type = $id->type;
        $this->web_url = $id->web_url;
    }

    public function updateOrganization()
    {
        $this->validate();

        $this->organization->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'type' => $this->type,
            'web_url' => $this->web_url,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Organization updated successfully.');
        $this->redirect(route('organizations'));
    }

    public function render()
    {
        return view('livewire.organization-edit');
    }
}

