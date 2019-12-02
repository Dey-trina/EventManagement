<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\lighting;
use App\User;
use DB;

class LightController extends Controller
{
     public function index()
    {
    	return view('admin.light.addlight');
    }

    public function save(Request $request){
    	
    	/*
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
            $new_image_name=rand(123456,999999).".".$image_ext;
            $destination_path=public_path('/lighting');
            $pictureInfo[$i]->move( $destination_path,$new_image_name);
            $lightEntry=new Lighting();
            $lastId=$lightEntry->id;
            $lightEntry->user_id=$userId;
            $lightEntry->lightName=$request->name;
            $lightEntry->cost=$request->price;
            $lightEntry->lightImage=$new_image_name;
        
            $lightEntry->save();
        }*/
 $userId=Auth::user()->id;
         $lightEntry=new lighting();
         //$lastId=$foodEntry->id;
        $lightEntry->user_id=$userId;
        $lightEntry->eventType=$request->eventType;
        $lightEntry->lightName=$request->name;
            $lightEntry->cost=$request->price;
        $lightEntry->lightImage='image';
       
        
         $lightEntry->save();
        $lastId=$lightEntry->id;
        //echo $lastId;
        $pictureInfo=$request->file('image');
        //echo "<pre>";
        //print_r($pictureInfo);
        //echo "</pre>";
        $picName=$lastId.$pictureInfo->getClientOriginalName();
        //echo $picName;
        $folder="lighting/";
        $pictureInfo->move($folder,$picName);
        $picUrl=$folder.$picName;
        $productPic=lighting::find($lastId);
        $productPic->lightImage=$picUrl;
        $productPic->save();

 
            return redirect('/light/addlight')->with('message','New Light insert successfully!');



}
public function manage()
    {       
            $userId=Auth::user()->id;
            $lights= DB::table('lightings')->distinct()->select('id','user_id','eventType','lightName','cost','lightImage')
            ->where('lightings.user_id',$userId)
            //->get()
            ->paginate(7);
            
            
        

        return view('admin.light.lightManage',['lights'=>$lights]);
    }
    public function singleProduct($user_id,$lightName)
    {
        //$userId=Auth::user()->id;
        $lights=DB::table('lightings')
        ->select('*')
        // ->select('lightings.*','admin_profiles.companyName as comName')
        ->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('admin.light.singleProduct',['light'=>$lights]);
    }

  public function editProduct($lightName)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $light=lighting::where('lightName',$lightName)->first();
        //->first();

        return view('admin.light.lightEdit',['light'=>$light]);
    }
    public function updateProduct( Request $request)
    {
            
            $light=lighting::where('id',$request->light_id)->first();
           
               if($picInfo=$request->file('image'))
               {
                if(file_exists($light->lightImage)){
                  unlink($light->lightImage);  
                }
                //echo "update";
                $picName=$picInfo->getClientOriginalName();
                $path="lighting/";
                $picUrl=$path.$picName;
                $picInfo->move($path,$picName);
               }
               else
               {
                //echo "not";
                $picUrl=$light->lightImage;
               }
               
                $light=lighting::find($request->light_id);
                 $light->eventType=$request->eventType;
                $light->lightName=$request->name;
                $light->cost=$request->price;
                $light->lightImage=$picUrl;
                $light->save();
                return redirect('/light/light_manage')->with('message','Lights Updated Successfully!');
              
               
              

    }
       public function delete($id)
    {
        //$userId=Auth::user()->id;
        $light=lighting::where('id',$id)->first();

        //echo $food;
        if(file_exists($light->lightImage))
        {
            unlink($light->lightImage);
        }
        $productDelete=lighting::findOrFail($id);
        //echo $productDelete;
        $productDelete->delete();
        return redirect('/light/light_manage')->with('message','Lights Deleted Successfully!');
       
}

//user

public function user_manage()
    {       
            $userId=Auth::user()->id;
            $lights= DB::table('lightings')
            //->distinct()
            ->select('id','user_id','eventType','lightName','cost','lightImage')
            //->where('lightings.user_id',$userId)
            //->get()
            ->paginate(5);
            
            
        

        return view('user.light.lightManage',['lights'=>$lights]);
    }
    public function user_singleProduct($user_id,$lightName)
    {
        //$userId=Auth::user()->id;
        $lights=DB::table('lightings')
        ->join('admin_profiles','admin_profiles.user_id','lightings.user_id')
         ->select('lightings.*','admin_profiles.companyName as comName')
        //->where('user_id',$user_id)
        ->where('lightName',$lightName)
        //->get();
        ->first();
        

        return view('user.light.singleProduct',['light'=>$lights]);
    }


//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $lights=DB::table('lightings')->where('lightName','like','%'.$search.'%')
        ->orWhere('cost','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.light.lightManage',['lights'=>$lights]);
    }

//com
    public function com_manage($user_id)
    {       
            //$userId=Auth::user()->id;
            $a=$user_id;
            $lights= DB::table('lightings')
            //->distinct()
            ->select('id','user_id','eventType','lightName','cost','lightImage')
            ->where('lightings.user_id',$a)
            //->get()
            ->paginate(5);
            
            
        

        return view('user.light.lightComManage',['lights'=>$lights]);
    }
    public function com_singleProduct($user_id,$lightName)
    {
        //$userId=Auth::user()->id;
        $lights=DB::table('lightings')
        ->join('admin_profiles','admin_profiles.user_id','lightings.user_id')
         ->select('lightings.*','admin_profiles.companyName as comName')
        //->where('user_id',$user_id)
        ->where('lightName',$lightName)
        //->get();
        ->first();
        

        return view('user.light.singleComProduct',['light'=>$lights]);
    }

}
