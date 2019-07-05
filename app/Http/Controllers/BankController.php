<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::orderBy('created_at', 'DESC')->paginate(10);
        return view('bank.index', compact('banks'));
    }

    public function create()
    {
        return view('bank.add');
    }

    public function save(Request $request)
    {
    //VALIDASI DATA
    $this->validate($request, [
        'kode_bank' => 'required|string',
        'nama_bank' => 'required|string'
    ]);

    try {
        $bank = Bank::create([
            'kode_bank' => $request->kode_bank,
            'nama_bank' => $request->nama_bank
            
        ]);
        return redirect('/bank')->with(['success' => 'Data telah disimpan']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){
    $bank = Bank::find($id);
    return view('bank.edit', compact('bank'));
        }

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'kode_bank' => 'required|string',
        'nama_bank' => 'required|string'
    ]);

    try {
        $bank = Bank::find($id);
        $bank->update([
            'kode_bank' => $request->kode_bank,
            'nama_bank' => $request->nama_bank
        ]);
        return redirect('/bank')->with(['success' => 'Data telah diperbaharui']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        return redirect()->back()->with(['success' => '<strong>' . $bank->name . '</strong> Telah dihapus']);
    }
}
