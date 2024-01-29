<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
{
    $siswa = Siswa::latest()->paginate(5);
    return view('siswa.index', compact('siswa'));
}
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required',
            'kelas' => 'required'
        ]);

        //upload image

        //create siswa
        Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function destroy(Siswa $siswa)
    {
        //delete siswa
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }
    public function update(Request $request, Siswa $siswa)
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required',
            'kelas' => 'required'
        ]);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
