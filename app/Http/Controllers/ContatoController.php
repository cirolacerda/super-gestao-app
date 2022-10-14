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
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'

        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.required' => 'O campo telefone precisa ser preenchido',

            'email.email' => 'O email informado não é válido',

            'required' => 'O campo :attribute deve ser preenchido'
        ];

        //validando dados do formulario
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');

    }

}
