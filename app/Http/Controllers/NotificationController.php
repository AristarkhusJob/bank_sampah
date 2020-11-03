<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == "") {
            $notification = Notification::orderBy('id', 'desc')->paginate(5);
        }
        else {
            $notification = Notification::where('name','like',"%".$request->search."%")
                    ->orWhere('address','like',"%".$request->search."%")
                    ->orWhere('phoneNumber','like',"%".$request->search."%")
                    ->orWhere('information','like',"%".$request->search."%")
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        }

        return view('penjemputan', compact('notification'))
                  ->with('i', (request()->input('page',1) -1)*5);
        //return response()->json($request);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $notification = Notification::create($input);
        return response()->json('success');
    }

    public function destroy($id)
    {
        $notif = Notification::find($id);
        $notif->delete();
        return redirect()->route('notif.index')
                        ->with('success', 'Notif berhasil dihapus.');
    }
}
