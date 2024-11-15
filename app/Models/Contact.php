<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['organization_id', 'name', 'email', 'phone', 'designation', 'address', 'created_by', 'updated_by'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
