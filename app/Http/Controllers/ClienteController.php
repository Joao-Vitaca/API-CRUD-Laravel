<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return $cliente;
    }

    public function show($cliente)
    {
        $cliente = Cliente::findOrFail($cliente);
        return $cliente;
    }

    public function update(Request $request, $cliente)
    {
        $cliente =  Cliente::findOrFail($cliente);
        $cliente->nome = $request['nome'];
        $cliente->email = $request['email'];
        $cliente->senha = $request['senha'];
        $cliente->save();
        return $cliente;
    }

    public function destroy($cliente)
    {
        $cliente =  Cliente::findOrFail($cliente);
        $cliente->delete();
        return $cliente;
    }
}
