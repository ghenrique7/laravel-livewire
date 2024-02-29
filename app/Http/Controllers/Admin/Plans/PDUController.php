<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Http\Controllers\Controller;
use App\Http\Requests\PDURequest;
use App\Models\Support\Sector;
use App\Services\Plans\PDIService;
use App\Services\Plans\PDUService;
use Illuminate\Http\Request;

class PDUController extends Controller
{
    public function __construct(
         protected PDUService $pduService,
         protected PDIService $pdiService,
    ) {
    }

    public function index(Request $request)
    {
        $plans = $this->pduService->getAll($request->filter);

        return view('admin.estrategia.planos.pdu.index', compact('plans'));
    }

    public function create()
    {
        $sectors = Sector::get();
        return view('admin.estrategia.planos.pdu.create', compact('sectors'));
    }

    public function store(PDURequest $request)
    {
        $this->pduService->new($request->all());

        return redirect()->route('pdu.index');
    }

    public function show($id)
    {
        $plan = $this->pduService->findOne($id);
        return view('admin.estrategia.planos.pdu.show', compact('plan'));
    }

    public function edit($id)
    {
        if (!$plan = $this->pduService->findOne($id)) {
            return redirect()->route('pdu.index');
        }

        $sectors = Sector::get();

        return view('admin.estrategia.planos.pdu.edit', compact('plan','sectors'));
    }

    public function update(PDURequest $request, $id)
    {
        if (!$this->pduService->findOne($id)) {
            return redirect()->route('pdu.index');
        }

        $this->pduService->update($request->all(), $id);

        return redirect()->route('pdu.index');
    }

    public function destroy($id)
    {
        $this->pduService->delete($id);

        return redirect()->route('pdu.index');
    }
}
