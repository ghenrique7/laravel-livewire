<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Models\Plans\TypePlan;
use App\Models\Plans\Plan;
use Illuminate\Http\Request;
use App\Models\Plans\Indicator;
use App\Models\Plans\Objective;
use App\Models\Support\Sector;
use App\Http\Requests\PDIRequest;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->with('type_plan')->paginate();

        return view('admin.estrategia.planos.index', compact('plans'));
    }

    public function create(Request $request)
    {
    }

    public function store(PDIRequest $request)
    {
        $query = $request->except('_token');
        $this->repository->create($query);
        return redirect()->route('plano.pdi.index')->with('success', 'Plano Cadastrado com Sucesso');
    }

    public function show($id)
    {
        $plan = Plan::where('id', $id)->with('sector')->first();
        $objectives = Objective::all();
        $indicators = Indicator::all();

        return view('admin.estrategia.planos.pdi.show', compact('plan', 'objectives', 'indicators'));
    }

    public function destroy($id)
    {
        if (!$plans = $this->repository->where('id', $id)->first()) {
            return redirect()->back()->with('danger', 'Falha ao excluir');
        }

        $plans->delete();

        return redirect()->route('plano.index')->with('success', 'Plano excluído com sucesso');
    }


    public function edit($id)
    {
        $plan = $this->repository->where('id', $id)->first();
        $sectors = Sector::all()->sortBy('sector');
        $typePlan = TypePlan::where('id', $plan->type_plan_id)->first();

        if (!$plan)
            return redirect()->back()->with('danger', 'Falha ao Editar');
        else
            return view('admin.estrategia.planos.pdi.edit', compact('plan', 'sectors', 'typePlan'));
    }

    public function update(PDIRequest $request, $id)
    {
        $plans = $this->repository->where('id', $id)->first();

        if ($plans->count() == 0)
            return redirect()->back()->with('danger', 'Plano não encontrado');

        else
            $plans->update($request->except('_token', '_method'));
        return redirect()->route('plano.index')->with('success', 'Edição realizada com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);
        return view('admin.estrategia.planos.index', compact('filters', 'plans'));
    }
}
