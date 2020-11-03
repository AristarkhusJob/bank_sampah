<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trash;
use App\Category;

class TrashController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == "") {
            $trash = Trash::orderBy('id', 'desc')->paginate(10);
        }
        else {
            $trash = Trash::join('categories','trashes.category_id','=','categories.id')
                            ->where('trashes.trash_name','like',"%".$request->search."%")
                            ->orWhere('categories.category_name','like',"%".$request->search."%")
                            ->orderBy('trashes.id', 'desc')
                            ->paginate(10);
        }

        return view('trash', compact('trash'))
                  ->with('i', (request()->input('page',1) -1)*10);
        //return response()->json($request);
    }

    public function create()
    {
        $category = Category::all();
        $trash = Trash::all();
        return view('addTrash', compact('trash', 'category'));
    }

    public function store(Request $request)
    {
        $rules = [
            'trash_name' => 'required',
            'category' => 'required'
        ];

        $customMessages = [
            'trash_name.required' => 'Nama Sampah Harus Diisi !',
            'category.required' => 'Kategori Sampah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        if (Trash::where('trash_name', $request->trash_name)->exists()) {
            return redirect()->back()->with('error', 'Nama Sampah sudah ada !');
        }

        $data = array(
            'trash_name' => $request->trash_name,
            'category_id' => $request->category,
        );
        Trash::insert($data);
        return redirect()->route('trash.index')->with('success', 'Sampah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $choose = Trash::find($id);
        $trash = Trash::all();
        $category = Category::all();
        return view('updateTrash', compact('choose','trash', 'category'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'trash_name' => 'required',
        ];

        $customMessages = [
            'trash_name.required' => 'Nama Sampah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        $trash = Trash::find($id);

        if (strtolower($request->trash_name) == strtolower($trash->trash_name)) {
            if ($request->category != "") {
                $trash->category_id = $request->get('category');
            }
            $trash->trash_name = $request->get('trash_name');
            $trash->save();
        }
        else if (Trash::where('trash_name', $request->trash_name)->exists()) {
            return redirect()->back()->with('error', 'Nama Sampah sudah ada !')->withInput();
        }
        else {
            $trash->trash_name = $request->get('trash_name');
            if ($request->category != "") {
                $trash->category_id = $request->get('category');
            }
            $trash->save();
        }

      return redirect()->route('trash.index')
                      ->with('success', 'Sampah berhasil di update.');
    }

    public function destroy($id)
    {
        $trash = Trash::find($id);
        $trash->delete();
        return redirect()->route('trash.index')
                        ->with('success', 'Sampah berhasil dihapus.');
    }

}
