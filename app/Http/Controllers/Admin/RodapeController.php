<?php

namespace App\Http\Controllers\Admin;

use App\Rodape;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RodapeRequest;

class RodapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rodapes = Rodape::get();
        return view('admin.rodape.index', ['rodapes' => $rodapes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rodape.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RodapeRequest $request)
    {


        $status =   isset($request->status)? 1 : 0;
        $request->status = $status;
        $rodape = Rodape::create($request->only(['frase','autor_frase']));
        $rodape->setSatus($request->status);

        return redirect()->route('rodape.index')->with('success', 'Frase do rodape Cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rodape = Rodape::where('id',$id)->first();


        return view(
            'admin.rodape.edit',
            [
                'rodape' => $rodape
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RodapeRequest $request, $id)
    {
        $rodape = Rodape::where('id',$id)->first();


        $rodape->fill($request->all());


        $rodape->status = isset($request->status)? 1 : 0;


        $rodape->save();

        return redirect()->route('rodape.index')->with('success', 'Frase do rodapé editada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rodape = Rodape::where('id', $id)->first();

        if($rodape){
            $rodape->delete();

            return redirect()->route('rodape.index')->with('success', 'Frase do rodapé excluida com sucesso');
        }else{
            return redirect()->route('rodape.index')->with('danger', 'Não foi possivel excluir a frase do rodape');

        }
    }

    public function fraseRodape()
    {

       $rodape = Rodape::where('status',1)->first();


         return view('admin.layouts.components.rodape',['rodape'=>$rodape]);
    }

}
