<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cortes;

class AddCorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        $saloes = DB::table('salaos')->where('user_id', "{$user_id}")->get();
        return view('admin.addcorte', compact('saloes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['img', '_token']);
        if (!$anime) {
            $data = $request->except(['img', '_token']);
            // Pedindo o campo img
            $file = $request->img;
            // Destino da imagem
            $destinatioPath = public_path('img');
            // Nome e a extensão da imagem
            $img = $filename = time()." - {$request->name}.{$file->getClientOriginalExtension()}";
            // Movendo a imagem para o destino e renomeando
            $file->move($destinatioPath, $filename);
            $user_id = Auth::id();
            // Adicionando
            $add = Cortes::create($data + compact('img', 'user_id'));
            // Msg de sucesso
            Session::flash('success', 'Anime adicionado com sucesso');
            // Mandando para created de volta
            return redirect('/admin/animes/create');
            // Se não encontro
        } else {
            // Msg de error
            Session::flash('error', 'Error ao adicionar Anime: Já existe anime com esse nome no banco de dados');
            // Mandando para created de volta
            return redirect('/painel/animes/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
