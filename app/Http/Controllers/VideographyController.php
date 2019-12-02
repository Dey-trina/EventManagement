<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\videography;
use Auth;
use App\User;
use DB;

class VideographyController extends Controller
{
     public function index()
    {
    	return view('admin.videography.addvideography');
    }
     public function save(Request $request){

    	
    	/*
    	//echo $lastId;
        if($request->hasFile('video'))
        {
    	$videoInfo=$request->file('video');
    	
        $array_len=count($videoInfo);
        //echo $array_len;
        

        for($i=0 ;$i<$array_len; $i++)
        {
        	$userId=Auth::user()->id;
           $video_ext=$videoInfo[$i]->getClientOriginalExtension();
          
           //echo  $image_ext."<br/>";
            $new_video_name=rand(123456,999999).".".$video_ext;
            
            $destination_path=public_path('/videography');
            $videoInfo[$i]->move( $destination_path,$new_video_name);
            
             $videoEntry=new Videography();
            $lastId=$videoEntry->id;
            $videoEntry->user_id=$userId;
            $videoEntry->videographyCompanyName=$request->name;
            $videoEntry->videographyCost=$request->vprice;
            
            $videoEntry->videographyDemo=$new_video_name;
            
            $videoEntry->save();
        }*/
        $userId=Auth::user()->id;
         $videoEntry=new videography();
         //$lastId=$foodEntry->id;
        $videoEntry->user_id=$userId;
        $videoEntry->eventType=$request->eventType;
          $videoEntry->videographyCompanyName=$request->name;
            $videoEntry->videographyCost=$request->vprice;
        $videoEntry->videographyDemo='video';
       
        
         $videoEntry->save();
        $lastId=$videoEntry->id;
        //echo $lastId;
        $pictureInfo=$request->file('video');
        //echo "<pre>";
        //print_r($pictureInfo);
        //echo "</pre>";
        $picName=$lastId.$pictureInfo->getClientOriginalName();
        //$filename=time().'.'. $pictureInfo->getClientOriginalExtension();
        //echo $picName;
        $folder="videography/";
        $pictureInfo->move($folder,$picName);
        $picUrl=$folder.$picName;
        $productPic=videography::find($lastId);
        $productPic->videographyDemo=$picUrl;
        $productPic->save();


            return redirect('/videography/addvideography')->with('message','New Videography Company Name insert successfully!');

}
public function manage()
    {       
            $userId=Auth::user()->id;
            $videos= DB::table('videographies')->distinct()->select('id','user_id','eventType','videographyCompanyName','videographyCost','videographyDemo')
            ->where('videographies.user_id',$userId)
            //->get()
            ->paginate(7);
            
            
        

        return view('admin.videography.videographyManage',['videos'=>$videos]);
    }
    public function singleProduct($user_id,$videographyCompanyName)
    {
        //$userId=Auth::user()->id;
        $videos=DB::table('videographies')
        ->select('*')
        ->where('videographyCompanyName',$videographyCompanyName)
        ->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('admin.videography.singleProduct',['video'=>$videos]);
    }

  public function editProduct($videographyCompanyName)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $video=videography::where('videographyCompanyName',$videographyCompanyName)->first();
        //->first();

        return view('admin.videography.videoEdit',['video'=>$video]);
    }
    public function updateProduct( Request $request)
    {
            
            $video=videography::where('id',$request->video_id)->first();
           
               if($picInfo=$request->file('video'))
               {
                if(file_exists($video->videographyDemo)){
                  unlink($video->videographyDemo);  
                }
                //echo "update";
                $picName=$picInfo->getClientOriginalName();
                $path="videography/";
                $picUrl=$path.$picName;
                $picInfo->move($path,$picName);
               }
               else
               {
                //echo "not";
                $picUrl=$video->videographyDemo;
               }
               
                $video=videography::find($request->video_id);
                $video->eventType=$request->eventType;
                $video->videographyCompanyName=$request->name;
                $video->videographyCost=$request->price;
                $video->videographyDemo=$picUrl;
                
                $video->save();
                return redirect('/videography/videography_manage')->with('message','VideographyCompany Updated Successfully!');
                     

    }


     public function delete($id)
    {
        //$userId=Auth::user()->id;
        $video=videography::where('id',$id)->first();

        //echo $food;
        if(file_exists($video->videographyDemo))
        {
            unlink($video->videographyDemo);
        }
        $productDelete=videography::findOrFail($id);
        //echo $productDelete;
        $productDelete->delete();
        return redirect('/videography/videography_manage')->with('message','Videography Company Deleted Successfully!');
       
}

//user

public function user_manage()
    {       
            $userId=Auth::user()->id;
            $videos= DB::table('videographies')
            //->distinct()
            ->select('id','user_id','eventType','videographyCompanyName','videographyCost','videographyDemo')
           // ->where('videographies.user_id',$userId)
            //->get()
            ->paginate(3);
            
            
        

        return view('user.videography.videographyManage',['videos'=>$videos]);
    }
    public function user_singleProduct($user_id,$videographyCompanyName)
    {
        //$userId=Auth::user()->id;
        $videos=DB::table('videographies')
        ->join('admin_profiles','admin_profiles.user_id','videographies.user_id')
        ->select('videographies.*','admin_profiles.companyName as comName')
        ->where('videographyCompanyName',$videographyCompanyName)
        //->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('user.videography.singleProduct',['video'=>$videos]);
    }


//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $videographies=DB::table('videographies')->where('videographyCompanyName','like','%'.$search.'%')
        ->orWhere('videographyCost','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.videography.videographyManage',['videographies'=>$videographies]);
    }
//com
    public function com_manage($user_id)
    {       
            //$userId=Auth::user()->id;
            $a=$user_id;
            $videos= DB::table('videographies')
            //->distinct()
            ->select('id','user_id','eventType','videographyCompanyName','videographyCost','videographyDemo')
            ->where('videographies.user_id',$a)
            //->get()
            ->paginate(7);
            
            
        

        return view('user.videography.videographycomManage',['videos'=>$videos]);
    }
  
    public function com_singleProduct($user_id,$videographyCompanyName)
    {
        //$userId=Auth::user()->id;
        $videos=DB::table('videographies')
        ->join('admin_profiles','admin_profiles.user_id','videographies.user_id')
        ->select('videographies.*','admin_profiles.companyName as comName')
        ->where('videographyCompanyName',$videographyCompanyName)
        //->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('user.videography.singlecomProduct',['video'=>$videos]);
    }


}
