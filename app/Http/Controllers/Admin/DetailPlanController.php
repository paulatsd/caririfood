<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailRequest;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {

        if (!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);
    }

    public function create($urlPlan)
    {

        if (!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);

    }

    public function store(StoreUpdateDetailRequest $request, $urlPlan)
    {

        if (!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        // $dados = $request->all();
        // $dados['plan_id'] = $plan->id;
        // $this->repository->create($dados);

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);

    }

    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if( !$plan && !$detail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail
        ]);

    }

    public function update(StoreUpdateDetailRequest $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if( !$plan && !$detail){
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }



}
