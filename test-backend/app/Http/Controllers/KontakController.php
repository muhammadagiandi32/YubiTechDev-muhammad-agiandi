<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return 'test';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kontak = Kontak::get();
        return response()->json($kontak);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:kontaks',
            'phone_number' => 'required|min:9',
        ]);
        if ($validator->fails()) {
            return response()->json(['http_status_code' => 400, 'error' => $validator->errors()->toJson()], 400);
        }
        $kontak = new Kontak();
        $kontak->user_id = $request->user_id;
        $kontak->nama = $request->name;
        $kontak->email = $request->email;
        $kontak->nomor_telfon = $request->phone_number;
        $kontak->save();
        // return $kontak;
        if ($kontak) {
            return response()->json([
                'http_status_code' => 200,
                'data' => $kontak,
                'error' => null
            ]);
        }
        return response()->json([
            'http_status_code' => 500,
            'data' => null,
            'error' => 'Gagal'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data = Kontak::where('id', $id)->first();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|between:2,100',
        //     'email' => 'required|string|email|max:100|unique:kontaks',
        //     'phone_number' => 'required|min:9',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['http_status_code' => 400, 'error' => $validator->errors()->toJson()], 400);
        // }
        // return $request . $id;
        $kontak = Kontak::find($id);
        // $kontak->user_id = $request->user_id;
        $kontak->nama = $request->editname;
        $kontak->email = $request->editemail;
        $kontak->nomor_telfon = $request->editphone_number;
        $kontak->save();
        return $kontak;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        // dd($kontak);
        // return $id;
        Kontak::find($id)->delete();

        return response()->json(['success' => 'Site deleted successfully.']);
    }
}
