<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() //halaman awal
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create'); //untuk halaman nambah data karyawan
    }

    public function store(Request $request) //untuk post data yang diisi di formulir pake varianle $request
    {
        $request->validate([
            'nik' => 'nullable|integer',
            'name'=> 'require|string|max:255',
            'username' => 'require|string|max:255|unique:users',
            'password' => 'require|string|min:6',
            'jabatan_id' => 'require|integer|exists:jabatan,id', //kolom jabatan_id di tabel user itu ngarah ke id nya di tabel jabatan
            'pekerjaan_id' => 'require|integer|exists:pekerjaan,id', //kolom pekerjaan_id di tabel user itu ngarah ke id nya di tabel pekerjaan
        ],      [
            'username.unique' => 'Username sudah digunakan',
            'password.min' => 'password tidak boleh kurang dari 6 karakter',
        ]);
        User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin('false'),
            'jabatan_id' => $request->jabatan_id,
            'pekerjaan_id' => $request->pekerjaan_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Data Karyawan Berhasil disimpan');

    }

    public function show(User $user)
    {
        return view('user.show', compact('user')); //membawa data dari table user, ke halaman show sambil membawa data user
    }
}
