<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cortes;
use App\Salaos;
use Session;
use App\Http\Requests\AddCorteRequest;
use App\Http\Requests\EditCorteRequest;
use File;

class AddCorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $corte = DB::table('cortes')->orderBy('id', 'DESC')->where('user_id', $user_id)->paginate(40);
        return view('admin.IndexCorte', compact('corte', 'salao'));
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
    public function store(AddCorteRequest $request)
    {
        $data = $request->except(['img', '_token']);
            $data = $request->except(['img', '_token']);
            // Pedindo o campo img
            $file = $request->img;
            // Destino da imagem
            $destinatioPath = public_path('img');
            // Nome e a extensão da imagem
            $img = $filename = time()." - {$request->nome}.{$file->getClientOriginalExtension()}";
            // Movendo a imagem para o destino e renomeando
            $file->move($destinatioPath, $filename);
            $user_id = Auth::id();
            $saloes = DB::table('salaos')->where('id', "{$request->salao_id}")->where('user_id', $user_id)->first();
            $salao_nome = $saloes->nome;
            // Adicionando
            $add = Cortes::create($data + compact('img', 'user_id', 'salao_nome'));
            // Msg de sucesso
            Session::flash('success', 'Corte adicionado com sucesso');
            // Mandando para created de volta
            return redirect('/admin/corte');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $corte = DB::table('cortes')->where('id', $id)->where('user_id', $user_id)->first();
        if($corte){
            return view('admin.ShowCorte', compact('corte'));
        }else{
            return view('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();
        $corte = DB::table('cortes')->where('id', $id)->where('user_id', $user_id)->first();
        if($corte){
            $saloes = Salaos::where('user_id', $user_id)->get();
            return view('admin.addcorte', compact('saloes', 'corte'));
        }else{
            return view('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCorteRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'img']);
        if($request->img){
            // Pedindo o campo img
            $file = $request->img;
            // Destino da imagem
            $destinatioPath = public_path('img');
            // Nome e a extensão da imagem
            $img = $filename = time()." - {$request->nome}.{$file->getClientOriginalExtension()}";
            // Movendo a imagem para o destino e renomeando
            $file->move($destinatioPath, $filename);
            $saloes = DB::table('salaos')->where('id', "{$request->salao_id}")->first();
            $salao_nome = $saloes->nome;
            $user_id = Auth::id();
            // Adicionando
            $add = Cortes::where('id', $id)->where('user_id', $user_id)->update($data + compact('img', 'user_id', 'salao_nome'));
            Session::flash('success', 'Corte atualizado com sucesso');
            return redirect('/admin/corte');
        }else{
            $data = $request->except(['_token', '_method', 'img']);
            $user_id = Auth::id();
            $saloes = DB::table('salaos')->where('id', "{$request->salao_id}")->where('user_id', $user_id)->first();
            $salao_nome = $saloes->nome;
            $add = Cortes::where('id', $id)->where('user_id', $user_id)->update($data + compact('user_id', 'salao_nome'));
            Session::flash('success', 'Corte atualizado com sucesso');
            return redirect('/admin/corte');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::id();
        $corte = Cortes::where('id', $id)->where('user_id', $user_id)->first();
        if($corte){
            File::delete("img/{$corte->img}");
            $deletado = $corte->delete();
            Session::flash('success', 'Corte excluido com sucesso');
            return redirect('/admin/corte');
        }else{
            return view('404');
        }
    }
}
