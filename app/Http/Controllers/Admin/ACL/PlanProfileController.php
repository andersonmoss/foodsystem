<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $profile, $plan;
    
    public function __construct(Profile $profile, Plan $plan)
    {
        $this->profile = $profile;
        $this->plan = $plan;
    }
    
    public function profiles($planId){
        $plan = $this->plan->find($planId);

        $profilesIn = $plan->profiles;
        $profilesOut = $this->profile->all()->diff($profilesIn);

        return view('admin.pages.plans.profiles', compact('profilesIn', 'profilesOut', 'plan'));
    }

    public function attachProfileToPlan($planId, $profileId) {
        $plan = $this->plan->find($planId);
        $profile = $this->profile->find($profileId);

        $plan->profiles()->attach($profile);

        return redirect()->back();
    }

    public function detachProfileToPlan($planId, $profileId) {
        $plan = $this->plan->find($planId);
        $profile = $this->profile->find($profileId);

        $plan->profiles()->detach($profile);

        return redirect()->back();
    }

    public function plans($profileId){
        $profile = $this->profile->find($profileId);

        $plansIn = $profile->plans;
        $plansOut = $this->plan->all()->diff($plansIn);

        return view('admin.pages.profiles.plans', compact('plansIn', 'plansOut', 'profile'));
    }

    public function attach($profileId, $planId) {
        $plan = $this->plan->find($planId);
        $profile = $this->profile->find($profileId);

        $profile->plans()->attach($plan);

        return redirect()->back();
    }

    public function detach($profileId, $planId) {
        $plan = $this->plan->find($planId);
        $profile = $this->profile->find($profileId);

        $profile->plans()->detach($plan);

        return redirect()->back();
    }
}
