<?php

namespace App\Http\Controllers;

use Log;
use Throwable;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('siswa')->latest()->paginate(5);
        $total = $pembayaran->groupBy('id_siswa')->map(function ($group) {
            return $group->sum('jumlah_bayar');
        });
        $pembayarans = Pembayaran::select('id_siswa', \DB::raw('MAX(tgl_bayar) as tgl_bayar'), \DB::raw('SUM(jumlah_bayar) as total_bayar'))
            ->groupBy('id_siswa')
            ->latest('tgl_bayar')
            ->paginate(5);
        $total = $pembayaran->groupBy('id_siswa')->map(function ($group) {
            return $group->sum('jumlah_bayar');
        });
        $data = Siswa::all();
        return view('pembayarans.index', compact('pembayarans', 'data', 'total'));
    }


    public function create()
    {
        $data = Siswa::all();
        return view('pembayarans.index', compact('data'));
    }

    /**
     * store
     *
     * @param Request $request         
     * @return void
     */
    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'id_siswa' => 'required',
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required'
        ]);

        // create pembayaran
        Pembayaran::create([
            'id_siswa' => $request->id_siswa,
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah_bayar' => str_replace('.', '', $request->jumlah_bayar),
        ]);

        // redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function destroy(pembayaran $pembayaran)
    {
        //delete pembayaran
        $pembayaran->delete();

        //redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function edit(pembayaran $pembayaran)
    {
        return view('pembayarans.edit', compact('pembayaran'));
    }
    public function update(Request $request, pembayaran $pembayaran)
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required',
            'kelas' => 'required'
        ]);

        $pembayaran->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        //redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function detail($id)
    {
        $id_siswa = $id;

        // Assuming you have a Pembayaran model and 'id_siswa' is the column name in the table
        $detail = Pembayaran::with('siswa')
            ->where('id_siswa', $id_siswa)
            ->latest()
            ->paginate(5);

        $total = $detail->groupBy('id_siswa')->map(function ($group) {
            return $group->sum('jumlah_bayar');
        });

        // Pass the $detail data to the view
        return view('pembayarans.detail', compact('detail', 'total'));
    }
}
