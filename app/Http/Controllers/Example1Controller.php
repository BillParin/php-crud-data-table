<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Yajra\Datatables\Datatables;


class Example1Controller extends Controller
{
    public function index()
    {
        return view('example1');
    }
    public function get_soline($id)
    {
        // $data = DB::table('SALESLINE')->where('SALESID',$id)->get();

        $data = DB::connection('ax')->SELECT("SELECT * ,0 as Cancel 
                                            FROM SALESLINE 
                                            WHERE SALESID=? and DATAAREAID = 'dsc'", [$id]);
        return $data;
    }
    public function add(Request $request)
    {
        // dd($request);

        $ck_insert = true;
        try {
            DB::beginTransaction();
            foreach ($request["row"] as $key => $value) 
            {
                //insert data
                // echo $value["SALESID"] . "   ". $value["ITEMID"] . "<br>";
                //SOLine
                $result_insert = DB::table('Example1')->insert(
                                    ['SO' => $value["SALESID"],
                                    'Itemid' => $value["ITEMID"],
                                    'qty' => $value["SALESQTY"],
                                    'Cancel' => $value["Cancel"]]
                                );
                if(!$result_insert) $ck_insert = false; 
            }
            if($ck_insert)
            {
                DB::commit();
                 return  ['result' => true, 'massage' => "Save complete"];
            }
        } catch (\Exception $e) {
            DB::rollback();
            return  ['result' => false, 'massage' => "Save faield"];
        }
        

    }
}