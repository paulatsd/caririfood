<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    //
    public function index(){

        //Faz paginação e exibe o último registro
        $plans = $this->repository->latest()->paginate(3, ['*'], 'pagina');

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    public function create(){
        return view('admin.pages.plans.create');
    }

    public function store(Request $request){

        $data = $request->all();
        $data['url'] = Str::kebab($data['name']);

        $this->repository->create($data);

        return redirect()->route('plans.index');


    }

    public function show ($url)
    {
        # code...

        $plan = $this->repository->where('url', $url)->first();

        if(! $plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy ($url)
    {
        # code...

        $plan = $this->repository->where('url', $url)->first();

        if(! $plan)
            return redirect()->back();

        $plan->delete();
        
        return redirect()->route('plans.index');
    }
}
