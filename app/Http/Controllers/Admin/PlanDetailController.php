<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanDetail;
use Illuminate\Http\Request;

class PlanDetailController extends Controller
{
    protected $repository, $plan;
    
    public function __construct(PlanDetail $planDetail, Plan $plan)
    {
        $this->repository = $planDetail;
        $this->plan = $plan;
    }

    public function index($url){
        $plan = $this->plan->where('url', $url)->first();

        if(!$plan) return redirect()->back('');

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }
}
