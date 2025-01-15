<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Organization;
use App\Models\Package;
use Livewire\Component;

class PackageComponent extends Component
{
    public $packages;
    public $package_name, $vendor_name, $price, $status;

    public function store()
    {
        $this->validate([
            'package_name' => 'required',
            'vendor_name' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        Package::create([
            'package_name' => $this->package_name,
            'vendor_name' => $this->vendor_name,
            'price' => $this->price,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Package Created Successfully.');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->package_name = '';
        $this->vendor_name = '';
        $this->price = '';
        $this->status = '';
    }

    public function render()
    {
        $this->packages = Package::all();
        return view('livewire.package-component');
    }

    public function delete(Package $id)
    {
        $id->delete();
        session()->flash('success', 'Package deleted successfully.');
    }
}
