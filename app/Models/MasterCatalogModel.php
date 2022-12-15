<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class MasterCatalogModel extends Model
{
    public function GetCatalogTable(){
        $corp = DB::select(
            "SELECT Id
            ,CatalogId
            ,CatalogName
            ,CatalogDescription
            ,CreateBy
        FROM CatalogTable"
        );
        return $corp;
    }

    public function add_hardware($txtAddHardware,$txtAddHardDes,$getId){
        try {

            $getId = $getId;
            DB::beginTransaction();
            $insert_hardware = DB::insert(
                'INSERT INTO CatalogTable
                    (   CatalogId,
                        CatalogName,
                        CatalogDescription,
                        CreateDate,
                        CreateBy
                    )
                    VALUES(?,?,?,GETDATE(),?)',
                    [
                        $getId,
                        $txtAddHardware,
                        $txtAddHardDes,
                        Auth::user()->UserId
                    ]);
            if($insert_hardware){
                DB::commit();
                return true ;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }

    }

    public function update_hardware($txt_editharddes,$txt_edithardware,$txt_id){
        try {


            DB::beginTransaction();
            $update_hardware = DB::update(
                'UPDATE CatalogTable
                    SET CatalogName = ?,
                        CatalogDescription = ?
                        WHERE CatalogId = ?',
                    [
                        $txt_edithardware,
                        $txt_editharddes,
                        $txt_id
                    ]);
            if($update_hardware){
                DB::commit();
                return true ;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }

    }

    public function get_numbersuence($id){
        try {
            $corp = DB::select(
                "SELECT NumNext
                        ,NumYear
                FROM NumberSequenceTable
                WHERE Id = ?",[$id]
            );
            $data = json_decode(json_encode($corp), true);
            return $data[0]['NumYear']."-".$data[0]['NumNext'] ;
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function update_genid($id){
        try {
            $id = $id;
            $yearnow = date("Y");
            $gendata_id = self::get_numbersuence($id);
            $subdata = explode("-",$gendata_id);
            $year = $subdata[0];
            $number = $subdata[1];
            if($yearnow == $year){
                $year = $yearnow ;
                $number = $number + 1 ;
            }else{
                $year = $yearnow ;
                $number = 1 ;
            }
            DB::beginTransaction();
            $data = DB::update(
                "UPDATE NumberSequenceTable
                    SET NumNext = ?
                        ,NumYear = ?
                    WHERE Id = ? ",
                [
                    $number,$year, $id
                ]
            );
            if($data){
                DB::commit();
                return true ;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }
    }

    public function select_cataloglinetable($id){
        $corp = DB::select(
            "SELECT
            CL.CatalogLineId,
            CT.CatalogDescription,
            AT.ActionName,
            CL.LineActive,
            AT.ActionId
            FROM CatalogLine CL
            JOIN CatalogTable CT ON CT.CatalogId = CL.CatalogId
            JOIN CatalogAction AC ON AC.CatalogActionId = CL.CatalogId AND AC.CatalogLineId = CL.CatalogLineId
            JOIN ActionTable AT ON AT.ActionId = AC.ActionId
            WHERE CL.CatalogId = ?",
            [
                $id
            ]
        );
        return $corp;
    }

    public function select_getactive(){
        $corp = DB::select(
            "SELECT
             ActionId,
             ActionName,
             ActionActive
            FROM ActionTable"

        );
        return $corp;
    }

    public function add_action($txtAddAction){
        try {
            DB::beginTransaction();
            $insert_hardware = DB::insert(
                'INSERT INTO ActionTable
                    (
                        ActionName,
                        ActionActive,
                        CreateDate,
                        CreateBy
                    )
                    VALUES(?,1,GETDATE(),?)',
                    [
                        $txtAddAction,
                        Auth::user()->UserId
                    ]);
            if($insert_hardware){
                DB::commit();
                return true ;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }

    }

    public function add_hardwareline($txt_action,$txt_addhardware,$getId){
        try {

            $getId = $getId;
            DB::beginTransaction();
            $insert_hardwareline = DB::insert(
                'INSERT INTO CatalogLine
                    (   CatalogLineId,
                        LineActive,
                        CreateDate,
                        CreateBy,
                        CatalogId
                    )
                    VALUES(?,?,GETDATE(),?,?)',
                    [
                        $getId,
                        1,
                        Auth::user()->UserId,
                        $txt_addhardware
                        
                    ]);
            if($insert_hardwareline){

                $insert_CatalogAction = DB::insert(
                    'INSERT INTO CatalogAction
                        (   CatalogActionId,
                            CatalogLineId,
                            ActionId,
                            CreateDate,
                            CreateBy
                        )
                        VALUES(?,?,?,GETDATE(),?)',
                        [
                            $txt_addhardware,
                            $getId,
                            $txt_action,
                            Auth::user()->UserId
                            
                        ]);
                    if($insert_CatalogAction){
                        DB::commit();
                        return true ;
                    }else{
                        DB::rollback();
                        return false ;
                    }
                
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }
    }

    public function update_action($txt_editaction,$txt_active,$txt_id){
        try {
            DB::beginTransaction();
            $update_action = DB::update(
                'UPDATE ActionTable
                    SET ActionName = ?,
                        ActionActive = ?
                        WHERE ActionId = ?',
                    [
                        $txt_editaction,
                        $txt_active,
                        $txt_id
                    ]);
            if($update_action){
                DB::commit();
                return true ;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }

    }

    public function delete_action($id){
        try {
            DB::beginTransaction();
            $update_action = DB::table('ActionTable')->where('ActionId', $id)->delete();
            if($update_action){
                DB::commit();
                return true ;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }
    }

    public function update_hardwareline($txt_editaction,$txt_id,$txt_edithardware){
        try {
            DB::beginTransaction();
             $update_CatalogAction = DB::update(
                    'UPDATE CatalogAction
                        SET ActionId = ?
                            WHERE CatalogLineId = ? AND CatalogActionId = ?',
                        [
                            $txt_editaction,
                            $txt_id,
                            $txt_edithardware
                        ]);
                if($update_CatalogAction){
                    DB::commit();
                    return true ;
                }
            
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }

    }

    public function delete_hardwareline($id,$catalogId){
        try {
            DB::beginTransaction();
            $delete_hardwareline = DB::table('CatalogLine')->where('CatalogLineId', $id)->delete();
            if($delete_hardwareline){
                $delete_CatalogAction = DB::table('CatalogAction')->where('CatalogLineId', $id)->delete();
                if($delete_CatalogAction){
                    DB::commit();
                    return true ;
                }else{
                    DB::rollback();
                    return false ;
                }
                
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false ;
        }
    }
}
?>