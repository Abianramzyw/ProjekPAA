<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Resources\CarsResource;

class CarsController extends Controller
{
    public function index()
    {
        $data = Cars::all();

        return $data;
    }

    public function store(Request $request)
    {
        // //define validation rules
        // $validator = Validator::make($request->all(), [
        //     'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'title'     => 'required',
        //     'content'   => 'required',
        // ]);

        //check if validation fails
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $cars = Cars::create([
            'type'     => $request->type,
            'merk'     => $request->merk,
            'cc'   => $request->cc,
            'price'   => $request->price,
        ]);

        //return response
        return new CarsResource(true, 'Data Mobil Berhasil Ditambahkan!', $cars);
    }

    public function show($id)
    {
        $cars = Cars::find($id);
        //return single post as a resource
        return new CarsResource(true, 'Data Post Ditemukan!', $cars);
    }

    public function update(Request $request, $id)
    {
        $cars = Cars::where('id', $id)->first();
        $cars->update([
            'type' => $request->type,
            'merk' => $request->merk,
            'cc' => $request->cc,
            'price' => $request->price,
        ]);

        return new CarsResource(true, 'Data Mobil Berhasil Diubah!', $cars);
    }

    public function delete($id)
    {
        $cars = Cars::where('id', $id)->first();
        $cars->delete();

        return "Data berhasil dihapus";
    }
}
