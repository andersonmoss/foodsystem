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
}
