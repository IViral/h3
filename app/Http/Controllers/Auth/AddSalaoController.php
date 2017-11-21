<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Salaos;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormSalaoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;


class AddSalaoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $salao = DB::table('salaos')->orderBy('id', 'DESC')->where('user_id', "{$user_id}")->paginate(20);
        return view('admin.indexsalao', compact('salao', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addsalao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormSalaoRequest $request)
    {
        $salao = DB::table('salaos')->where('nome', $request->input('nome'))->get()->first();
        if(!$salao){
            $data = $request->except(['_token']);
            $user_id = Auth::id();
            $add = Salaos::create($data + compact('user_id'));
            Session::flash('success', 'Salão adicionado com sucesso');
            return redirect('/admin/salao');
        }else{
            Session::flash('error', 'Error ao adicionar o salão, já existe outro salão cadastrado com esse nome');
            return redirect('/admin/salao/create');
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
        $user_id = Auth::id();
        $salao = DB::table('salaos')->where('id', $id)->where('user_id', $user_id)->first();
        if($salao){
            return view('Admin.ShowSalao', compact('salao'));
        }
        return view('404');
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
        $salao = DB::table('salaos')->where('id', $id)->where('user_id', $user_id)->first();
        if($salao){
            return view('admin.addsalao', compact('salao'));
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
    public function update(FormSalaoRequest $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $user_id = Auth::id();
        $add = DB::table('salaos')->where('id', $id)->where('user_id', $user_id)->update($data + compact('user_id'));
        if($add){
            Session::flash('success', 'Salão atualizado com sucesso');
            return redirect('/admin/salao');
        }else{
            Session::flash('error', 'Você nao tem permissao para fazer mudanças nesse salão');
            return redirect('/admin/salao');
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
        $delete = Salaos::where('id', $id)->where('user_id', $user_id)->first();
        if($delete){
            $deletar = $delete->delete();
            Session::flash('success', 'Salão deletado com sucesso');
            return redirect('/admin/salao');
        }else{
            Session::flash('error', 'Você nao tem permissao para deletar esse salão');
            return redirect('/admin/salao');
        }
    }
}
