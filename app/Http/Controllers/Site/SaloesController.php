<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Cortes;

class SaloesController extends Controller
{
    public function index()
    {
        $salao = DB::table('Salaos')->where('status', 0)->get();

        return view('site.saloes', compact('salao'), ['title' => 'Salões - H3%']);
    }

    public function salao($id)
    {
        $salao = DB::table('Salaos')->where('id', "{$id}")->first();
        if($salao){
            $cortes = DB::table('Cortes')->where('salao_id', "{$id}")->get();
            return view('site.salao', compact('salao', 'cortes'), ['title' => "{$salao->nome} - H3%"]);
        }
        else{
            return view('404');
        }
    }
}
