<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends BaseModel
{
    use HasFactory;

    const PERMISSIONS = [
        'addGame',
        'editGame',
        'deleteGame',

        'addGenre',
        'editGenre',
        'deleteGenre',

        'addPublisher',
        'editPublisher',
        'deletePublisher',

        'addRole',
        'editRole',
        'deleteRole',
        'activateRole',

        'addPermission',
        'editPermission',
        'deletePermission',
        'activatePermission',

        'addKey',
        'editKey',
        'deleteKey',

        'assignRole',
        'assignPermission',
        
        'addUser',
        'editUser',
        'deleteUser',

        'cancelOrder',
        'acceptOrder',
    ];

    /**
     * @return BelongsToMany
     */
    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
