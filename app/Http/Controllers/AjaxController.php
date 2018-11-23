<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class AjaxController extends Controller
{

    public function post(Request $request)
    {

        $content = $request->x . " " . $request->y . " " . $request->k." ".$request->b;
        Storage::disk('local')->put('xy.txt', $content);
        /*$response = array(
    'status' => 'success',
    'msg' => $request->x,

    );
    return response()->json($response);*/
    }
}
