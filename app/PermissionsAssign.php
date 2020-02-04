<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\HasPermission;

class PermissionsAssign extends Model
{
    protected $table = 'model_has_permissions';

    // protected $primarykey = 'id';

    protected $fillable = [
        'permission_id',
        'model_type',
        'model_id',
        ];
}
