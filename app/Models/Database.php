<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    use HasFactory;

    protected $fillable = ['organization_id', 'db_driver', 'db_name', 'db_host', 'db_username', 'db_password', 'db_port', 'db_prefix', 'admin_email', 'admin_password',
        'migration_progress', 'seed_progress', 'created_by', 'updated_by'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }


}
