<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            $statusCode = $exception->getStatusCode();

            if (view()->exists("errors.{$statusCode}")) {
                return response()->view("errors.{$statusCode}", [], $statusCode);
            }
        }

        return parent::render($request, $exception);
    }

    public function index()
    {
        $members = $this->getMembers();
        return view('show')->with('members', $members);
    }

    public function getMembers()
    {
        $members = Siswa::all();
        return $members;
    }


    public function save(Request $request)
    {
        $member = new Siswa;
        $member->nama = $request->input('nama');
        $member->kelas = $request->input('kelas');
        $member->save();

        //return redirect('/siswa');
        return redirect('/siswa')->with(['success' => 'Data Berhasil Tambah!']);
    }

    public function update(Request $request, $id)
    {
        $member = Siswa::find($id);
        $input = $request->all();
        $member->fill($input)->save();

        return redirect('/siswa');
    }

    public function delete($id)
    {
        $members = Siswa::find($id);
        $members->delete();
        //redirect to index
        return redirect('/siswa')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
