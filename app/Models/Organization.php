<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'type', 'web_url', 'created_by', 'updated_by'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function databases()
    {
        return $this->hasMany(Database::class);
    }
}
