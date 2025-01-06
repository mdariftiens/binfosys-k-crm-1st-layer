<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Organization;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PackageEdit extends Component
{
    public $packages;
    public $package_name, $vendor_name, $price, $status;

    public function mount(Package $id)
    {
        $this->packages = $id;
        $this->package_name = $id->package_name;
        $this->vendor_name = $id->vendor_name;
        $this->price = $id->price;
        $this->status = $id->status;
    }

    public function update(Package $id)
    {
        $this->validate([
            'package_name' => 'required',
            'vendor_name' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        $this->packages->update([
            'package_name' => $this->package_name,
            'vendor_name' => $this->vendor_name,
            'price' => $this->price,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Package updated Successfully.');
        $this->redirect(route('packages'));
    }



    public function render()
    {
        return view('livewire.package-edit');
    }
}
