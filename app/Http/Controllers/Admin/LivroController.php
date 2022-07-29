<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Livro;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LivroRequest as LivroRequest;
//tive que criar um novo para no update a foto poder ser nula
use App\Http\Requests\LivroUpdateRequest as LivroUpdateRequest;


class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::get();

        return view('admin.livro.index', [
            'livros' => $livros,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.livro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroRequest $request)
    {


        $NovoLivro = Livro::create($request->all());

        $NovoLivro->setSlug();
        if ($request->file('foto_capa')->isValid()) {
            $NovoLivro->setFotoCapa($request->file('foto_capa'));
        }

        return redirect()->route('livros.index')->with('success', 'Novo Livro Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $livro = Livro::where('slug', $slug)->first();

        if (!empty($livro->data_fim_leitura)) {
            $CalculotempoLeitura = DateTime::createFromFormat('Y-m-d', $livro->data_inicio_leitura)->diff(DateTime::createFromFormat('Y-m-d', $livro->data_fim_leitura));
            $tempo = $CalculotempoLeitura->days;
        } else {
            $tempo = 0;
        }


        return view('admin.livro.show', ['livro' => $livro, 'tempo' => $tempo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $livro = Livro::where('slug', $slug)->first();


        return view('admin.livro.edit', [
            'livro' => $livro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(LivroUpdateRequest $request, $slug)
    {

        $livro = Livro::where('slug', $slug)->first();


        $livro->fill($request->all());

        if (!empty($request->file('foto_capa'))) {
            $livro->updateFotoCapa($request->file('foto_capa'), $livro->id);
        }

        $livro->save();

        return redirect()->route('livros.index')->with('success', ' Livro Editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $livro = Livro::where('slug', $slug)->first();
        $path = $livro->foto_capa;


        if (Storage::exists($path)) {
        // ajustar depois pq nao esta excluindo a pasta somente a imagem
            Storage::delete($livro->foto_capa);
        } else {
            return redirect()->route('livros.index')->with('danger', 'Erro ao excluir o Livro');
        }

        $livro->delete();
        return redirect()->route('livros.index')->with('success', ' Livro excluido com sucesso');
    }


    public function listarLivros(Request $request)
    {

            $pesquisarLivros = null;
            $data_inicio = $request->get('data_inicio_pesquisa');
            $data_fim = $request->get('data_fim_pesquisa');

            $pesquisarLivros =  $this->pesquisarLivros($data_inicio, $data_fim);
            return view('admin.livro.listar_livros',[
                'pesquisarLivros' => $pesquisarLivros
            ]);

    }
    public function pesquisarLivros($data_inicio, $data_fim)
    {
        $query = Livro::query();
       if((!empty($data_inicio)) &&  (!empty($data_fim))){
        //dd($data_fim, $data_inicio);
          $dados =  $query->select('id','titulo','autor','numero_pagina','data_inicio_leitura')->whereDate('data_inicio_leitura', '>=',  $data_inicio)->get();
          return $dados;
       }

    }
}
