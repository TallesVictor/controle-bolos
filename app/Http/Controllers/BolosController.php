<?php

namespace App\Http\Controllers;

use App\Models\Bolos;
use App\Models\Emails;
use Exception;
use Illuminate\Http\Request;


class BolosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bolos = new Bolos();
        $bolos = $bolos->index();
        // if($bolos == null){
        //     return response('Bolo não econtrado', 404);
        // }
        return view('home', ['bolos' => $bolos]);
        return view('emails.mail', ['bolos' => $bolos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bolos = request()->all();
        $bolos['peso'] = str_replace('.', '', $bolos['peso']);
        $bolos['valor'] = str_replace('.', '', $bolos['valor']);
        $bolos['peso'] = str_replace(',', '.', $bolos['peso']);
        $bolos['valor'] = str_replace(',', '.', $bolos['valor']);
        try {
            Bolos::create($bolos);
            return Bolos::all();
        } catch (Exception $ex) {
            return response(500, 'Não foi possível cadastrar o ' . $bolos['nome'] . $ex->getMessage());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bolos  $bolos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return Bolos::find($id);
        } catch (Exception $ex) {
            return response(500, 'Não foi possível pesquisar o ' . $id . $ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bolos  $bolos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $bolos = $request->input('peso');
        $bolos= $request->all();
        $bolos['peso'] = str_replace('.', '', $bolos['peso']);
        $bolos['valor'] = str_replace('.', '', $bolos['valor']);
        $bolos['peso'] = str_replace(',', '.', $bolos['peso']);
        $bolos['valor'] = str_replace(',', '.', $bolos['valor']);
        $bolo = Bolos::find($bolos['id']);
        $bolo->nome= $bolos['nome'];
        $bolo->peso= $bolos['peso'];
        $bolo->quantidade= $bolos['quantidade'];
        $bolo->valor= $bolos['valor'];

        try {
           $bolo->update();
            return Bolos::all();
        } catch (Exception $ex) {
            return response(500, 'Não foi possível cadastrar o ' . $bolos['nome'] . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bolos  $bolos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bolos = Bolos::find($id);
        if ($bolos) {
            try {
                $emails = Emails::where('bolo_id', $id);
                $emails->delete();
                $bolos->delete();
                return Bolos::all();
            } catch (Exception $ex) {
                return response(500, 'Não foi possível cadastrar o ' . $bolos['nome'] . $ex->getMessage());
            }
        }
        return response(404, 'Bolo não encontrado');
    }
}
