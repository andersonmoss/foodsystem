<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    public function search($filter = null) {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->latest()
                        ->paginate(2);

        return $results;
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function plans(){
        return $this->belongsToMany(Plan::class);
    }

    public function permissionsAvailable(){
        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->get();

        return $permissions;
    }
}
