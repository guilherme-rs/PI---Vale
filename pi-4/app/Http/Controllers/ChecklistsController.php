<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Incidente;
use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ChecklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklists = Checklist::get();
        return view('checklists.index', ['checklists' => $checklists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $pessoas = Pessoa::get();
        $checklist = Checklist::find($id);
        return view('checklists.create', [
            'id' => $checklist->id,
            'pessoas' => $pessoas]);
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
        $checklist = new Checklist();
        $id = Checklist::find($id)->incidente_id;
        $checklist->incidente_id = $id;
        $checklist->pessoa_id = Input::get('pessoa');
        $checklist->save();

        return redirect()->route('incidentes.show', ['id' => $checklist->incidente_id]);
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
