<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Profiles extends Model
{
    protected $table = 'user_profile';
    protected $guarded = ['id'];

    

    public function getProfiles($request){

        $values =$request->all();
        $data = DB::table('user_profile')
        ->select('user_profile.*');

        if(isset( $values["names"])){   
            $data->where('title','like','%'.$values["title"].'%');
        }

        if(isset( $values["location"])){   
            $data->where('location','like','%'.$values["location"].'%');
        }            


        if(isset( $values["sort_filter"])){ 
          switch ($values["sort_filter"]) 
           {
              case "0":
                  $data->orderBy('id',"ASC");
                  break;
              case "1":
                 $data->orderBy('id',"DESC");
                  break;   
            }  
        }
        else
        {
            $data->orderBy('user_profile.id','DESC');
        }             
                     
        
        $data = $data->paginate(10);
        return $data;
    }
   
    
    public function updateProfiles($request){

        $update = $request->all();
        $updateQuery = DB::table('user_profile')
        ->where('id', $update['id'])
        ->update(['name' => $update['name'],
            'email' => $update['email'],
            'location' => $update['location'],
            'phone' => $update['phone'],
            'description' => $update['description']]);
        if ($updateQuery) {
            return true;
        } else {
            
            return false;
        }
    }
    
    
    public function deleteProfiles($id){
        
        $deleteQuery = DB::table('user_profile')->delete($id);
        $deleteFiles = DB::table('files')->where('entity_id',$id)->delete();
        if ($deleteQuery && $deleteFiles) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
