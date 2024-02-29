<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Models\Support\Sector;
use Illuminate\Http\Request;
use App\Http\Requests\PDIRequest;
use App\Services\Plans\PDIService;
use App\Http\Controllers\Controller;

class PDIController extends Controller
{

    public function __construct(
        protected PDIService $pdiService
    ) {
    }

    public function index(Request $request)
    {
        $plans = $this->pdiService->getAll($request->filter);

        return view('admin.estrategia.planos.pdi.index', compact('plans'));
    }

    public function create()
    {
        $sectors = Sector::get();
        return view('admin.estrategia.planos.pdi.create', compact('sectors'));
    }

    public function store(PDIRequest $request)
    {
        $this->pdiService->new($request->all());

        return redirect()->route('pdi.index');
    }

    public function show($id)
    {
        $plan = $this->pdiService->findOne($id);
        return view('admin.estrategia.planos.pdi.show', compact('plan'));
    }

    public function edit($id)
    {
        if (!$plan = $this->pdiService->findOne($id)) {
            return redirect()->route('pdi.index');
        }

        $sectors = Sector::get();

        return view('admin.estrategia.planos.pdi.edit', compact('plan','sectors'));
    }

    public function update(PDIRequest $request, $id)
    {
        if (!$this->pdiService->findOne($id)) {
            return redirect()->route('pdi.index');
        }

        $this->pdiService->update($request->all(), $id);

        return redirect()->route('pdi.index');
    }

    public function destroy($id)
    {
        $this->pdiService->delete($id);

        return redirect()->route('pdi.index');
    }
}
