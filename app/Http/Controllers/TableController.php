<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequest;
use App\Models\Table;
use Illuminate\Contracts\View\View;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tableCollection = Table::orderBy("number")->get();
        return view("tables.index", compact("tableCollection"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tables.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        $data = $request->validated();
        Table::create(array_merge($data, ["status" => "available"]));
        return redirect()->route("tables.index")->with("message", "Table added successly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view("tables.edit", compact("table"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, Table $table)
    {
        $data = $request->validated();
        $table->update($data);
        return redirect()->route(route: "tables.index")->with("message", "Table updated successly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route("tables.index")->with("message", "Table deleted successly");
    }
}
