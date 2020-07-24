<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanDetail;
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

        if(!$plan) return redirect()->back();

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function create($url) {
        $plan = $this->plan->where('url', $url)->first();

        if(!$plan) return redirect()->back();

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(StoreUpdatePlanDetail $request, $url){
        $plan = $this->plan->where('url', $url)->first();

        if(!$plan) return redirect()->back();

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;

        // $this->repository->create($data);

        $plan->details()->create($request->all());
        return redirect()->route('plans.details.index', $plan->url);
    }

    public function edit($url, $detailId) {
        $plan = $this->plan->where('url', $url)->first();
        $detail = $this->repository->find($detailId);

        if(!$plan || !$detail) return redirect()->back();

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function update(StoreUpdatePlanDetail $request, $url, $detailId){
        $plan = $this->plan->where('url', $url)->first();
        $detail = $this->repository->find($detailId);

        if(!$plan || !$detail) return redirect()->back();

        $detail->update($request->all());
        
        return redirect()->route('plans.details.index', $plan->url);
    }
}
