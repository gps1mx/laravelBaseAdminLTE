<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

class Permissions extends Model
{
    protected $table = 'permissions';

    protected $primarykey = 'id';

    protected $fillable = [
        'name',
        'guard_name',
        ];

}
