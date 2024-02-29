<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Services\Support\SectorService;
use App\Services\Plans\IndicatorService;
use App\Services\Plans\ObjectiveService;
use Illuminate\Http\Request;
use App\Models\Plans\Indicator;
use App\Models\Plans\Objective;
use App\Models\Support\Sector;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndicatorRequest;

class IndicatorController extends Controller
{
    public function __construct(
        protected IndicatorService $indicatorService,
        protected ObjectiveService $objectiveService
    )
    {
    }

    public function index()
    {
        $indicators = $this->indicatorService->getAll();

        return view('admin.estrategia.indicadores.index', compact('indicators'));
    }
    public function create()
    {
        $objectives = $this->objectiveService->getAll();
        $sectors = Sector::get();
        return view('admin.estrategia.indicadores.create', compact('objectives', 'sectors'));
    }

    public function store(IndicatorRequest $request)
    {
        $this->indicatorService->new($request->all());
        return redirect()->route('indicador.index')->with('success', 'Indicador Cadastrado com Sucesso');
    }

    public function edit($id)
    {
        if (!$indicator = $this->indicatorService->findOne($id)) {
            return redirect()->back()->with('danger', 'Falha ao Editar');
        }

        $objectives = Objective::all();
        $sectors = Sector::get();

        return view('admin.estrategia.indicadores.edit', compact('indicator', 'objectives', 'sectors'));
    }

    public function update(IndicatorRequest $request, $id)
    {
        if (!$indicator = $this->indicatorService->findOne($id)) {
            return redirect()->back()->with('danger', 'Indicador não encontrado');
        }
        $this->indicatorService->update($request->all(), $indicator->id);

        return redirect()->route('indicador.index')->with('success', 'Edição realizada com sucesso');
    }

    public function destroy($id)
    {
        if (!$indicator = $this->indicatorService->findOne($id)) {
            return redirect()->back()->with('danger', 'Falha ao excluir');
        }

        $indicator->delete();

        return redirect()->route('indicador.index')->with('success', 'indicador Excluído com Sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $indicator = $this->indicatorService->search($request->filter);
        return view('admin.estrategia.indicadores.index', compact('indicator', 'filters'));
    }

    public function createByObjective($id) {
        if(!$objective = $this->objectiveService->findOne($id)) {
            return redirect()->route('pdi.index');
        }

        $sectors = Sector::get();

        return view('admin.estrategia.indicadores.create', compact('objective', 'sectors'));
    }

    public function editByObjective($idIndicator, $idObjective)
    {
        $indicator = $this->indicatorService->findOne($idIndicator);
        $objective = $this->objectiveService->findOne($idObjective);

        if (!$indicator || !$objective) {
            return redirect()->route('pdi.index');
        }

        $sectors = $this->sectorService->getAll();

        return view('admin.estrategia.indicadores.edit', compact('objective', 'indicator', 'sectors'));

    }

}
