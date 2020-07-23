<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Profiles as Profiles;
use App\Model\File as FileModel;
use File;
use DB;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    public function __construct(){

        $this->Profiles = new Profiles();
        $this->fileupload = new FileModel();
    }

    public function index(Request $request){

        $data = array();
        $data['profile'] =$this->Profiles->getProfiles($request);
        return view('profile',$data);  
    }

    public function create(){

        $data = array();
        return view('create',$data);
    }

    public function store(Request $request){

        $request->validate([
                'name'   => 'required|unique:user_profile|max:255',
                'email'  => 'required|email',
                'phone'   => 'required|numeric',
                'image' => 'required|mimes:jpeg,bmp,png',
                'location' => 'required|max:100',
                'description' => 'required'
        ]);
        
        $formated_date = Carbon::parse($request->get('release-date'))->format('Y/m/d');
        DB::beginTransaction();
        $id = DB::table('user_profile')->insertGetId(
                [ 'name' => $request->get('name'),
                'email' => $request->get('email'),
                  'location' => $request->get('location'),
                  'phone' => $request->get('phone'),
                  'description' => trim($request->get('description'))
                ]
                );

        $file_upload = $request->file('image');
        $upload = $this->fileupload->uploadFile($id,$file_upload);
        if($id && $upload){
            DB::commit();
            session(['showMessage' => true, 'successMessage' => 'Profile added successfully.']);
        }else{
            DB::rollback();
            session(['showMessage' => true, 'errorMessage' => 'Failed to add Profiless.']);
        }
        return redirect()->route('listing');
    }

    public function edit($id)
    {
        $data = array();
        $data['Profiles']  = Profiles::find($id);
        $data['file_details'] = FileModel::where('entity_id',$id)->first();
        return view('update', $data);
    }

    public function update(Request $request){
        
          $request->validate([
                'name'   => 'required',
                'email'  => 'email',
                'phone'   => 'required|numeric',
                'location' => 'required',
                'description' => 'required'
        ]);

        /*Update Profiles*/
        DB::beginTransaction();
        $data =$this->Profiles->updateProfiles($request);
        $file_upload = $request->file('image');
        $entity_id = $request->get('id');
        if($file_upload != null){
            $request->validate([
                'image' => 'required|mimes:jpeg,bmp,png',
            ]);
            $upload = $this->fileupload->updateFile($entity_id,$file_upload);
        }else{
            $upload = true;
        }
        if($upload){
            DB::commit();
            session(['showMessage' => true, 'successMessage' => 'Profile Updated successfully.']);
        }else{
            DB::rollback();
            session(['showMessage' => true, 'errorMessage' => 'Failed to Update Profiles.']);
        }
        return redirect()->route('listing');
    }

    
    public function destroy($id){

         $Profiles = Profiles::find($id);
        
        if(!isset($Profiles->id)){
            return response()->json([
                    'status' => false,
                    'message' => "Profiles that you tried to delete doesn't exist."
            ]);
        }
         
        $data =$this->Profiles->deleteProfiles($id);
        if($data){
            return response()->json([
                    'status' => true,
                    'message' => 'Profiles deleted successfully.'
            ]);
        }else{
            return response()->json([
                    'status' => false,
                    'message' => 'Failed to delete Profiless.'
            ]);
        }
    }
}



   