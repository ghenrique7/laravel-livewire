<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Services\Plans\IndicatorService;
use App\Services\Plans\ObjectiveService;
use App\Services\Plans\PDIService;
use Illuminate\Http\Request;
use App\Models\Plans\Indicator;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObjectiveRequest;
use App\Models\Plans\Perspective;
use App\Models\Plans\Plan;
use App\Models\Plans\Theme;

class ObjectiveController extends Controller
{

    public function __construct(
        protected ObjectiveService $objectiveService,
        protected IndicatorService $indicatorService,
        protected PDIService $pdiService
    )
    {
    }

    public function index()
    {
        $objectives = $this->objectiveService->getAll();
        $indicators = Indicator::all();

        return view('admin.estrategia.objetivos.index', compact('objectives', 'indicators'));
    }

    public function create()
    {
        $perspectives = Perspective::all();
        $themes = Theme::all();
        $plans = Plan::all();

        return view('admin.estrategia.objetivos.create', compact('perspectives', 'plans', 'themes'));
    }

    public function store(ObjectiveRequest $request)
    {
        $query = $request->all();
        //dd($query);
        $this->objectiveService->new($query);
        return redirect()->route('pdi.index')->with('success', 'Objetivo Cadastrado com Sucesso');
    }
    public function edit($id)
    {
        $objective = $this->objectiveService->findOne($id);
        $perspectives = Perspective::all();
        $themes = Theme::all();


        if (!$objective)
            return redirect()->back()->with('danger', 'Falha ao Editar');

        return view('admin.estrategia.objetivos.edit', compact('objective',  'perspectives', 'themes'));
    }

    public function update(ObjectiveRequest $request, $id)
    {
        $objective = $this->objectiveService->findOne($id);


        if (!$objective)
            return redirect()->back()->with('danger', 'Plano não encontrado');
        //dd($request->all());
        $objective->update($request->all());

        return redirect()->route('objetivo.index')->with('success', 'Edição realizada com sucesso');
    }

    public function destroy($id)
    {
        $objective = $this->objectiveService->findOne($id);

        if (!$objective)
            return redirect()->back()->with('danger', 'Falha ao excluir');
        else
            $objective->delete();
        return redirect()->route('pdi.index')->with('success', 'Objetivo Excluído com Sucesso');
    }

    public function search(Request $request)
    {
        //dd($request->all());
        $filters = $request->except('_token');
        $objectives = $this->objectiveService->search($request->filter);
        $indicators = Indicator::all();

        return view('admin.estrategia.objetivos.index', compact('filters', 'objectives', 'indicators'));
    }

    public function attachIndicatorObjective(Request $request, $idObjective)
    {
        if (!$objective = $this->objectiveService->findOne($idObjective)) {
            return redirect()->back();
        }

        if (!$request->indicators || count($request->indicators) == 0) {
            return redirect()
                ->back()
                ->with('danger', 'Precisa escolher pelo menos um indicador');
        }

        $objective->indicators()->attach($request->indicators);

        return redirect()->route('objetivo.index');
    }

    public function detachIndicatorObjective($idObjective, $idIndicator)
    {
        $objective = $this->objectiveService->findOne($idObjective);
        $indicator = $this->objectiveService->findOne($idIndicator);


        if (!$objective || !$indicator) {
            return redirect()->back();
        }

        $objective->indicators()->detach($indicator);

        return redirect()->route('objetivo.index');
    }

    public function createByPlan($id) {
        if(!$plan = $this->pdiService->findOne($id)) {
            return redirect()->route('pdi.index');
        }

        $perspectives = Perspective::all();
        $themes = Theme::all();

        return view('admin.estrategia.objetivos.create', compact('plan', 'themes', 'perspectives'));
    }

    public function editByPlan($idObjective, $idPlan) {

        $objective = $this->objectiveService->findOne($idObjective);
        $plan = $this->pdiService->findOne($idPlan);

        if(!$objective || !$plan) {
            return redirect()->route('pdi.index');
        }

        return view('admin.estrategia.objetivos.edit', compact('objective', 'plan'));
    }

}
