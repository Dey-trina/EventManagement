<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\photographies;
use App\User;
use DB;

class PhotographyController extends Controller
{
     public function index()
    {
    	return view('admin.photography.addphotography');
    }
     public function save(Request $request){

    	
    	
    	//echo $lastId;
        if($request->hasFile('image'))
        {
    	$pictureInfo=$request->file('image');
    
        $array_len=count($pictureInfo);
        //echo $array_len;
        

        for($i=0 ;$i<$array_len; $i++)
        {
            $userId=Auth::user()->id;
            $image_ext=$pictureInfo[$i]->getClientOriginalExtension();
          
           //echo  $image_ext."<br/>";
            $folder="photography/";
            $new_image_name=$folder.rand(123456,999999).".".$image_ext;
            
            $destination_path=public_path('/photography');
            $pictureInfo[$i]->move($destination_path,$new_image_name);
            
             $photoEntry=new photographies();
            $lastId=$photoEntry->id;
            $photoEntry->user_id=$userId;
            $photoEntry->eventType=$request->eventType;
            $photoEntry->photographyCompanyName=$request->name;
            $photoEntry->photographyCost=$request->pprice;
            
            $photoEntry->photographyDemo=$new_image_name;
            
            $photoEntry->save();
        }
            return redirect('/photography/addphotography')->with('message','New Photography Company Name insert successfully!');
}



}


public function manage()
    {       
            $userId=Auth::user()->id;
            $photos= DB::table('photographies')->distinct()->select('user_id','eventType','photographyCompanyName','photographyCost')
            ->where('photographies.user_id',$userId)
            //->get()
            ->paginate(7);
            //->distinct()
            //->get();   

        return view('admin.photography.photographyManage',['photos'=>$photos]);
    }

    public function singleProduct($user_id,$photographyCompanyName)
    {
        //$userId=Auth::user()->id;
        $photos=DB::table('photographies')
        ->select('*')
        ->where('photographyCompanyName',$photographyCompanyName)
        ->where('user_id',$user_id)
        ->get();
        //->first();
        

        return view('admin.photography.singleProduct',['photos'=>$photos]);
    }

 

//user
    public function user_manage()
    {       
            $userId=Auth::user()->id;
            $photos= DB::table('photographies')
            ->distinct()
            ->select('user_id','eventType','photographyCompanyName','photographyCost')
            //->where('photographies.user_id',$userId)
             //->where('photographyCompanyName',$photographyCompanyName)
            //->get()
            ->paginate(7);
            //->distinct()
            //->get();   

        return view('user.photography.photographyManage',['photos'=>$photos]);
    }

    public function user_singleProduct($user_id,$photographyCompanyName)
    {
        //$userId=Auth::user()->id;
        $photos=DB::table('photographies')
        ->join('admin_profiles','admin_profiles.user_id','photographies.user_id')
        ->select('photographies.*','admin_profiles.companyName as comName')
        ->where('photographyCompanyName',$photographyCompanyName)
        //->where('user_id',$user_id)
        ->get();
        //->first();
        

        return view('user.photography.singleProduct',['photos'=>$photos]);
    }


//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $photographies=DB::table('photographies')->where('photographyCompanyName','like','%'.$search.'%')
        ->orWhere('photographyCost','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.photography.photographyManage',['photographies'=>$photographies]);
    }

//com
       public function com_manage($user_id)
    {       
            //$userId=Auth::user()->id;
            $a=$user_id;
            $photos= DB::table('photographies')
            ->distinct()
            ->select('user_id','eventType','photographyCompanyName','photographyCost')
            ->where('photographies.user_id',$a)
             //->where('photographyCompanyName',$photographyCompanyName)
            //->get()
            ->paginate(7);
            //->distinct()
            //->get();   

        return view('user.photography.photographyComManage',['photos'=>$photos]);
    }

    public function com_singleProduct($user_id,$photographyCompanyName)
    {
        //$userId=Auth::user()->id;
        $photos=DB::table('photographies')
        ->join('admin_profiles','admin_profiles.user_id','photographies.user_id')
        ->select('photographies.*','admin_profiles.companyName as comName')
        ->where('photographyCompanyName',$photographyCompanyName)
        //->where('user_id',$user_id)
        ->get();
        //->first();
        

        return view('user.photography.singleComProduct',['photos'=>$photos]);
    }

}















