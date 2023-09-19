<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruM;

class GuruR extends Controller
{
    public function index()
    {
        $guruM = GuruM::all();
        return view('guru', compact('guruM'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nip' => 'required',
            'namaguru' => 'required',
            'mapel' => 'required',
        ]);

        GuruM::create($request->post());
        return redirect()->route('guru.index')->
        with ('success', 'Data Guru Berhasil ditambahkan');
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
    $guru = GuruM::find($id);
    return view('guru_edit', compact('guru'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'id' => 'required',
        'nip' => 'required',
        'namaguru' => 'required',
        'mapel' => 'required',
    ]);

    $data = $request->except(['_token', '_method', 'submit']); // Perbaikan pada bagian ini

    GuruM::where('id', $id)->update($data);
    return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        GuruM::where('id',$id)->delete();
        return redirect()->route('guru.index')->
        with ('success', 'Data Guru Berhasil dihapus');
    }
}