<?php

namespace App\Http\Controllers\Admin\Support;

use Illuminate\Http\Request;
use App\Models\Support\Sector;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSector;
use Exception;

class SectorController extends Controller
{
    private $repository;

    public function __construct(Sector $sector)
    {
        $this->repository = $sector;
    }

    public function index()
    {
        $sectors = $this->repository->orderBy('name', 'asc')->paginate(20);
        return view('admin.support.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.support.sectors.create');
    }

    public function store(StoreUpdateSector $request)
    {
        $query = $request->all();
        $this->repository->create($query);
        return redirect()->route('unidade.index')->with('success', 'Setor cadastrado com sucesso');
    }

    public function edit($id)
    {
        $sector = $this->repository->where('id', $id)->first();
        if (!$sector)
            return redirect()->back()->with('danger', 'Setor inexistente');
        return view('admin.support.sectors.edit', compact('sector'));
    }
    public function update(StoreUpdateSector $request, $id)
    {
        $sector = $this->repository->where('id', $id)->first();
        if (!$sector)
            return redirect()->back()->with('danger', 'Falha ao Editar');

        $sector->update($request->all());

        return redirect()->route('unidade.index', $sector->id)->with('success', 'Edição realizada com sucesso');
    }

    public function destroy($id)
    {
        if (!$sector = $this->repository->where('id', $id)->first())
            return redirect()->back()->with('danger', 'Falha ao excluir');

        $sector->delete();

        return redirect()->route('unidade.index')->with('success', 'Setor excluído com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $sectors = $this->repository->search($request->filter);

        return view('admin.support.sectors.index', compact('sectors', 'filters'));
    }
}
