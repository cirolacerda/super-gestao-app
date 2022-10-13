<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        //print_r($request->all());
        //var_dump($_POST);

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */
         /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        */
        /*
        $contato = new SiteContato();
        $contato->create($request->all());

        print_r($contato->getAttributes());
        */

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);


    }

    public function salvar(Request $request)
    {
        //validando dados do formulario
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'

        ]);

    }

}
