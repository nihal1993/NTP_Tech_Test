<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Storage;
class File extends Model
{
   
    protected $table = 'files';
    protected $guarded = ['id'];
    
    /**
     * uploadFile
     * This function is used to add uploaded details to files table
     *
     */
    public function uploadFile($entity_id,$file_upload)
    {
        $Result_id = DB::table('files')->insertGetId(
                [ 'entity_id' => $entity_id, 'file_path' => 'null', 'created_at' => now(), 'updated_at' => now()]
                );
        

        if($Result_id > 0){
            $file_path = $file_upload->store('profile'.'/'.$entity_id.'/'.$Result_id, 'public');
            DB::table('files')->where('id', $Result_id)->update(['file_path' => $file_path]);
            return $Result_id;
        }else {
            return false;
        }
    }   
    
    /**
     * uploadFile
     * This function is used to add uploaded details to files table
     *
     */
    public function updateFile($entity_id,$file_upload)
    {

        $files_id         = DB::table('files')->where('entity_id',$entity_id)->pluck('id');
        $files_local_path = DB::table('files')->where('entity_id',$entity_id)->pluck('file_path');

        if(file_exists(public_path('shetrades-uploads').'/'.$files_local_path[0])){
          unlink(public_path('shetrades-uploads').'/'.$files_local_path[0]);
        }
        
        $file_path  = $file_upload->store('profile'.'/'.$entity_id.'/'.$files_id[0], 'public');
        
        $Result     = DB::table('files')->where('entity_id', $entity_id)->update(['file_path' => $file_path, 'file_name' => $file_upload->getClientOriginalName(), 'size' => $file_upload->getClientSize(), 'updated_at' => now()]);
        

        if($Result){
            return true;
        }else {
            return false;
        }
    }

}
