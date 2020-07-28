<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details(){
        return $this->hasMany(PlanDetail::class);
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter = null) {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->latest()
                        ->paginate(2);

        return $results;
    }

    // public function plansAvailable(){
    //     $plans = Plan::whereNotIn('id', function($query){
    //         $query->select('plan_profile.plan_id');
    //         $query->from('plan_profile');
    //         $query->whereRaw("plan_profile.profile_id={$this->id}");
    //     })
    //     ->get();

    //     return $plans;
    // }
}
