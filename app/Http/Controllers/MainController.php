<?php

namespace App\Http\Controllers;

use App\Main;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if($request->all()) {
            try {
                Main::insert([
                    'taskName' => $request['taskName'],
                    'status' => $request['status']
                ]);
                return response()->json(['success' => 'Successfully added todo'], 200);
            } catch(\Exception $e) {
                return response()->json(['error' => "There was an error {$e}"], 400);
            }

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\main  $cr
     * @return \Illuminate\Http\Response
     */


    public function edit(Request $request, $id) {
        if($request->all()) {
            try {
                Main::where('id', '=', $id)->update([
                    'taskName' => $request['taskName']
                ]);
                return response()->json(['success' => 'Successfully edited todo'], 200);
            } catch(\Exception $e) {
                return response()->json(['error' => "There was an error {$e}"], 400);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\main  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        if($request->all()) {
            try {
                $todos =  Main::get();
                return response()->json(['success' => 'Successfully listed all todo', 'todos' => $todos], 200);
            } catch(\Exception $e) {
                return response()->json(['error' => "There was an error {$e}"], 400);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\main  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if($request->all()) {
            try {
                Main::where('id', '=', $id)->delete();
                return response()->json(['success' => 'Successfully deleted todo'], 200);
            } catch(\Exception $e) {
                return response()->json(['error' => "There was an error {$e}"], 400);
            }
        }
    }
}
