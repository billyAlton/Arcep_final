<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localite;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LocaliteImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LocaliteController extends Controller
{
    public function create(){

        return view('admin.localite.create');
    }
    public function import(Request $request)
    {
        if($request->method() === 'POST'){
            $file = $request->file('file');
            Storage::putFileAs('public/import',$file,$file->getClientOriginalName().strtotime('now').$file->getClientOriginalExtension());
            $localite = [];
            if(($open = fopen($file, "r"))!==false){
                while(($data = fgetcsv($open, 1000, ","))!== false){
                    $localite[] = $data;
                }
                fclose($open);
            }
            //dd($localite);
            $query = "INSERT INTO `localites`(`departement`, `commune`, `arrondissement`, `quartier`, `lat_dd`, `long_dd`) VALUES ";
            foreach($localite as $key => $loc){
                if($key !== 0)
                    $query .= '("'.$loc[0].'","'.$loc[1].'","'.$loc[2].'","'.$loc[3].'","'.$loc[4].'","'.$loc[5].'"),';
            }
            DB::insert(substr($query, 0, -1));
            return redirect()->route('localite.import')->with('message', 'Nice Job');
        }
        return view('admin.localite.import');
    }
}
