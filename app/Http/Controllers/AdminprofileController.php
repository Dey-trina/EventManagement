<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\admin_profile;
use App\User;
use DB;

class AdminprofileController extends Controller
{
    public function index()
    {
    	return view('admin.adminprofile.adminprofile');
    }
    public function save(Request $request){

          $user_favorites = DB::table('admin_profiles')
          ->where('user_id', '=', Auth::user()->id)
          ->first();
        // $user = DB::table('admin_profiles')->where('admin_profiles.user_id', '$userId')->count()<1


        
    	
            $userId=Auth::user()->id;
            if (is_null($user_favorites) ){
            $adminEntry=new admin_profile();            
            //$lastId=$adminEntry->id;             
            $adminEntry->user_id=$userId;
            $adminEntry->companyName=$request->cname;
            $adminEntry->managerName=$request->mname;
            $adminEntry->managerEmail=$request->memail;
            $adminEntry->managerConNo=$request->mcon;
            $adminEntry->address=$request->address;
            $adminEntry->companyDescription=$request->companyDescription;
            $adminEntry->companyLogo='image';
            $adminEntry->save();
            $lastId=$adminEntry->id;
            $pictureInfo=$request->file('image');
            /*echo "<pre>";
            print_r($pictureInfo);
            echo "</pre*/           
            $picName=$lastId.$pictureInfo->getClientOriginalName();
            //echo $picName;
            $folder="adminpro/";
            $pictureInfo->move($folder,$picName);
            $picUrl=$folder.$picName;
            $productPic=admin_profile::find($lastId);
            $productPic->companyLogo=$picUrl;
            $productPic->save();
               
              return redirect()->back()->with('message','New admin profile insert successfully!');
              
             
             }
             else{
              return redirect()->back()->with('message',' Profile inserted already!You can EDIT or VIEW your profile from Profile');
              
              
               
             }
            //$user = DB::table('admin_profiles')->where('admin_profiles.user_id', '$userId')->count();

            //return redirect()->back()->with('message','New admin profile insert successfully!');

}

public function manage()
    {       
            $userId=Auth::user()->id;
            $admins= DB::table('admin_profiles')->distinct()->select('id','user_id','companyName','managerName','managerEmail','managerConNo','address','companyDescription','companyLogo')
            ->where('admin_profiles.user_id',$userId)
            ->get();
            //->paginate(7);
            
            
        

        return view('admin.adminprofile.adminManage',['admins'=>$admins]);
    }

      public function singleProduct($user_id,$companyName)
    {
        //$userId=Auth::user()->id;
        $admins=DB::table('admin_profiles')
        ->select('*')
        ->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('admin.adminprofile.singleProduct',['admin'=>$admins]);
    }

    public function editProduct($companyName)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $admin=admin_profile::where('companyName',$companyName)->first();
        //->first();

        return view('admin.adminprofile.adminEdit',['admin'=>$admin]);
    }
    public function updateProduct( Request $request)
    {
            
            $admin=admin_profile::where('id',$request->admin_id)->first();
           
               if($picInfo=$request->file('image'))
               {
                if(file_exists($admin->companyLogo)){
                  unlink($admin->companyLogo);  
                }
                //echo "update";
                $picName=$picInfo->getClientOriginalName();
                $path="adminpro/";
                $picUrl=$path.$picName;
                $picInfo->move($path,$picName);
               }
               else
               {
                //echo "not";
                $picUrl=$admin->companyLogo;
               }
               
                $admin=admin_profile::find($request->admin_id);
                 $admin->companyName=$request->cname;
                 $admin->managerName=$request->mname;
                 $admin->managerEmail=$request->memail;
                 $admin->managerConNo=$request->mcon;
                 $admin->address=$request->address;
                 $admin->companyDescription=$request->companyDescription;
                 $admin->companyLogo=$picUrl;
                 $admin->save();
                
                return redirect('/adminprofile/admin_manage')->with('message','Profile Updated Successfully!');

              
               
              

    }


}

