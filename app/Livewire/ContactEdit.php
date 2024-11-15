<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactEdit extends Component
{
    public $organizations;
    public $contacts;
    public $organization_id, $name, $email, $phone, $designation, $address;

    public function mount(Contact $id)
    {
        $this->contacts = $id;
        $this->organization_id = $id->organization_id;
        $this->name = $id->name;
        $this->email = $id->email;
        $this->phone = $id->phone;
        $this->designation = $id->designation;
        $this->address = $id->address;
    }

    public function update(Contact $id)
    {
        $this->validate([
            'organization_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'designation' => 'required',
            'address' => 'required',
        ]);
        $this->contacts->update([
            'organization_id' => $this->organization_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'designation' => $this->designation,
            'address' => $this->address,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Contacts updated Successfully.');
        $this->redirect(route('contacts'));
    }


    public function render()
    {
        $this->organizations = Organization::all();
        return view('livewire.contact-edit');
    }
}
