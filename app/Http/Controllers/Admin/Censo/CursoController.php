<?php

namespace App\Http\Controllers\Admin\Censo;

use App\Http\Controllers\Controller;
use App\Models\Censo\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    //



    public function index()
    {

        $cursos = Curso::all();
        return view('admin.censo.curso.index', ['cursos' => $cursos]);
    }

    public function create()
    {
        return view('admin.censo.curso.create');
    }
    public function store(Request $request)
    {
        $query = $request->only([
            'codigo_curso',
            'nome',
            'unidade_academica',
            'grau',
            'modalidade',
            'nivel_academico',
            'data_inicio',
            'situacao',
            'local_oferta',
            'polo_ead'
        ]);
        $cursos = Curso::create($query);
        return redirect(route('curso.index'));
    }
}
