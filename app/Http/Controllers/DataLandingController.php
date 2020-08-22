<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataLandingController extends Controller
{
    function index(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('dataLanding')->with(['categories' => []]);
        }
        if ($request->isMethod('post')) {
            $fileQueries = storage_path('app/customerQueries.txt');
            $recivedData = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'message' => $request->input('message')
            ];
            if (file_exists($fileQueries)) {
                $db = json_decode(file_get_contents($fileQueries, true));
                array_push($db, $recivedData);
                file_put_contents($fileQueries, json_encode($db));
                return back()->with(['message' => 'Ваш запрос успешно отправлен']);
            } else {
                return back()->with(['message' => 'Что то пошло не так']);
            }
        }
    }
}
