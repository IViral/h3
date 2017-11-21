<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Salaos;
use Session;
use Illuminate\Support\Facades\Gate;
use App\User;
use Spatie\Permission\Models\Role;

class AnaliseSalaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('analista')) {
            return view('SemPermicao');
        }
        $salao = DB::table('salaos')->orderBy('id', 'DESC')->where('status', 2)->paginate(40);
        return view('admin.AnaliseSalao', compact('salao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('analista')) {
            return view('SemPermicao');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('analista')) {
            return view('SemPermicao');
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
        if (! Gate::allows('analista')) {
            return view('SemPermicao');
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
        if (! Gate::allows('analista')) {
            return view('SemPermicao');
        }
        $salao = DB::table('salaos')->where('id', $id)->where('status', 2)->first();
        if($salao){
            return view('admin.AnaliseSalaoEdit', compact('salao'));
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
    public function update(Request $request, $id)
    {
        if (! Gate::allows('analista')) {
            return view('SemPermicao');
        }
        $data = $request->except(['_token', '_method']);
        if($request->status == 0){
            Session::flash('success', 'Salao aprovado com sucesso');
        }else{
            Session::flash('success', 'Salao reprovado com sucesso');
        }
        $add = Salaos::where('id', $id)->where('status', 2)->update($data);
        return redirect('/admin/analise/salao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('analista')) {
            return view('SemPermicao');
        }
    }
}
