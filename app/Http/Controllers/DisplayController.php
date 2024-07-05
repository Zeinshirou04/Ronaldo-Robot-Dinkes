<?php

namespace App\Http\Controllers;


use App\Models\Display;
use Illuminate\Http\Request;

class DisplayController extends Controller
{

    private $display;

    public function __construct()
    {
        $this->display = new Display();
    }

    public function index() {
        return view('display/index');
    }

    public function setExpress(Request $request) {
        $this->display->device_id = $request->device_id;
        $this->display->ekspresi = $request->ekspresi;
        $this->display->save;
        try {
            $this->display->save();
            $status = [
                'status' => 'Berhasil',
            ];
            return $status; 
        } catch (\Throwable $th) {
            $status = [
                'status' => $th,
            ];
            //throw $th;
            return $status;
        }
    }

    public function getExpress() {
        $data = $this->display->orderBy('created_at', 'desc')->get()->first();
        return $data;
    }
}
