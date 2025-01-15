<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Organization;
use Livewire\Component;

class ContactComponent extends Component
{
    public $organizations;
    public $contacts;
    public $organization_id, $name, $email, $phone, $designation, $address;

    public function mount()
    {
        // Load organizations from database or any source
        $this->organizations = Organization::all();
    }

    public function store()
    {
        $this->validate([
            'package_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'designation' => 'required',
            'address' => 'required',
        ]);
        Contact::create([
            'organization_id' => $this->organization_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'designation' => $this->designation,
            'address' => $this->address,
            'created_by' => auth()->id(),
        ]);

        session()->flash('success', 'Contacts Created Successfully.');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->organization_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->designation = '';
        $this->address = '';
    }

    public function render()
    {
        $this->contacts = Contact::all();
        return view('livewire.contact-component');
    }

    public function contactDelete(Contact $id)
    {
        $id->delete();
        session()->flash('success', 'Contact deleted successfully.');
    }
}
