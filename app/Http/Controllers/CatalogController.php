<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Yajra\Datatables\Datatables;
use App\Models\MasterCatalogModel;


class CatalogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
        $this->corp = new MasterCatalogModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function select_hardwarehead()
    {
        $compa = $this->corp->GetCatalogTable();
        return $compa;

    }

    public function select_hardwareheadline(Request $request)
    {
        $id = $request->input('id');
        $compa = $this->corp->select_cataloglinetable($id);
        return $compa;

    }

    public function add_hardware(Request $request){
        $txtAddHardware =  $request->input('txtAddHardware');
        $txtAddHardDes =  $request->input('txtAddHardDes');
        $first = "HW";
        $getidnumber = 1 ;
        $getId = self::get_genid($getidnumber,$first);
        $compa = $this->corp->add_hardware($txtAddHardware,$txtAddHardDes,$getId);
        if($compa == true){
             $upategenid = $this->corp->update_genid($getidnumber);
            return $compa;
        }else{
            return $compa;
        }


    }

    public function update_hardware(Request $request){
        $txt_editharddes =  $request->input('txt_editharddes');
        $txt_edithardware =  $request->input('txt_edithardware');
        $txt_id =  $request->input('txt_id');
        $compa = $this->corp->update_hardware($txt_editharddes,$txt_edithardware,$txt_id);

            return $compa;



    }

    public function get_genid($id,$first){

    $gendata_id = $this->corp->get_numbersuence($id);
    $subdata = explode("-",$gendata_id);
    $year = $subdata[0];
    $number = $subdata[1];
    $getid = $first . substr($year, -2) . str_pad($number, 6, "0", STR_PAD_LEFT);
    return $getid;
    }

    public function select_getactive()
    {
        $compa = $this->corp->select_getactive();
        return $compa;

    }

    public function add_hardwareline(Request $request){
        $txt_action =  $request->input('txt_action');
        $txt_addhardware =  $request->input('txt_addhardware');
        $first = "S";
        $getidnumber = 2 ;
        $getId = self::get_genid($getidnumber,$first);
        $compa = $this->corp->add_hardwareline($txt_action,$txt_addhardware,$getId);
        if($compa == true){
             $upategenid = $this->corp->update_genid($getidnumber);
            return $compa;
        }else{
            return $compa;
        }


    }

    public function update_hardwareline(Request $request){
        $txt_editaction =  $request->input('txt_editaction');
        $txt_id =  $request->input('txt_id');
        $txt_edithardware =  $request->input('txt_edithardware');
        $compa = $this->corp->update_hardwareline($txt_editaction,$txt_id,$txt_edithardware);

            return $compa;
    }

    public function delete_hardwareline(Request $request){
        $id = $request->input('id');
        $catalogId = $request->input('CatalogId');
        $compa = $this->corp->delete_hardwareline($id,$catalogId);
            return $compa;
    }

    //catolog- action
    public function select_actionhead()
    {
        $action = $this->corp->select_getactive();
            return $action;
    }

    public function add_action(Request $request){
        $txtAddAction =  $request->input('txtAddAction');
        $compa = $this->corp->add_action($txtAddAction);
        return $compa;
    }

    public function update_action(Request $request){
        $txt_editaction =  $request->input('txt_editaction');
        $txt_active =  $request->input('txt_active');
        $txt_id =  $request->input('txt_id');
        $compa = $this->corp->update_action($txt_editaction,$txt_active,$txt_id);
            return $compa;
    }

    public function delete_action(Request $request){
        $id = $request->input('id');
        $compa = $this->corp->delete_action($id);
            return $compa;
    }
}
