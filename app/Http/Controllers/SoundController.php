<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\sound;
use App\User;
use DB;


class SoundController extends Controller
{
      public function index()
    {
    	return view('admin.sound.addsound');
    }
    public function save(Request $request){
    	
    	
    	
            $soundEntry=new sound();
            $userId=Auth::user()->id;
            $lastId=$soundEntry->id;
            $soundEntry->eventType=$request->eventType;
            $soundEntry->soundCompanyName=$request->name;
            $soundEntry->cost=$request->price;
            $soundEntry->user_id=$userId;
            $soundEntry->save();
        
            return redirect('/sound/addsound')->with('message','New Sound Company insert successfully!');

}
public function manage()
    {       
            $userId=Auth::user()->id;
            $sounds= DB::table('sounds')->distinct()->select('id','user_id','eventType','soundCompanyName','cost')
            ->where('sounds.user_id',$userId)
            //->get()
            ->paginate(7);
            
            
        

        return view('admin.sound.soundManage',['sounds'=>$sounds]);
    }
    public function singleProduct($user_id,$foodName)
    {
        //$userId=Auth::user()->id;
        $sounds=DB::table('sounds')
        ->select('*')
        ->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('admin.sound.singleProduct',['sound'=>$sounds]);
    }



      public function editProduct($soundCompanyName)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $sound=sound::where('soundCompanyName',$soundCompanyName)->first();
        //->first();

        return view('admin.sound.soundEdit',['sound'=>$sound]);
    }
    public function updateProduct( Request $request)
    {
            
            $sound=sound::where('id',$request->sound_id)->first();
           
               /*if($picInfo=$request->file('image'))
               {
                if(file_exists($food->foodImage)){
                  unlink($food->foodImage);  
                }
                //echo "update";
                $picName=$picInfo->getClientOriginalName();
                $path="food/";
                $picUrl=$path.$picName;
                $picInfo->move($path,$picName);
               }
               else
               {
                //echo "not";
                $picUrl=$food->foodImage;
               }*/
               
                $sound=Sound::find($request->sound_id);
                $sound->eventType=$request->eventType;
                $sound->soundCompanyName=$request->name;
                $sound->cost=$request->price;
                $sound->save();
                return redirect('/sound/sound_manage')->with('message','Sound Item Updated Successfully!');
                     

    }


     public function delete($id)
    {
        //$userId=Auth::user()->id;
        $sound=sound::where('id',$id)->first();

        //echo $food;
        /*if(file_exists($food->foodImage))
        {
            unlink($food->foodImage);
        }*/
        $productDelete=sound::findOrFail($id);
        //echo $productDelete;
        $productDelete->delete();
        return redirect('/sound/sound_manage')->with('message','Sound Item Deleted Successfully!');
       
}

public function user_manage()
    {       
            $userId=Auth::user()->id;
            $sounds= DB::table('sounds')
            //->join('admin_profiles','admin_profiles.user_id','sounds.user_id')
            //->distinct()
            ->select('id','user_id','eventType','soundCompanyName','cost')
            //->select('sounds.*','admin_profiles.companyName as comName')
            //->where('sounds.user_id',$userId)
            //->get()
            ->paginate(5);
            
        return view('user.sound.soundManage',['sounds'=>$sounds]);
    }
  
     public function user_singleProduct($user_id,$soundCompanyName)
    {
        //$userId=Auth::user()->id;
        $sounds=DB::table('sounds')
        ->join('admin_profiles','admin_profiles.user_id','sounds.user_id')
         ->select('sounds.*','admin_profiles.companyName as comName')
        //->where('user_id',$user_id)
        ->where('soundCompanyName',$soundCompanyName)
        //->get();
        ->first();
        

        return view('user.sound.singleProduct',['sound'=>$sounds]);
    }

//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $sounds=DB::table('sounds')->where('soundCompanyName','like','%'.$search.'%')
        ->orWhere('cost','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.sound.soundManage',['sounds'=>$sounds]);
    }
//com

    public function com_manage($user_id)
    {       
            //$userId=Auth::user()->id;
            $a=$user_id;
            $sounds= DB::table('sounds')
            //->join('admin_profiles','admin_profiles.user_id','sounds.user_id')
            //->distinct()
            ->select('id','user_id','eventType','soundCompanyName','cost')
            //->select('sounds.*','admin_profiles.companyName as comName')
             
            ->where('sounds.user_id',$a)
            //->get()
            ->paginate(5);
            
        return view('user.sound.soundComManage',['sounds'=>$sounds]);
    }
  
    public function com_singleProduct($user_id,$soundCompanyName)
    {
        //$userId=Auth::user()->id;
        $sounds=DB::table('sounds')
        ->join('admin_profiles','admin_profiles.user_id','sounds.user_id')
         ->select('sounds.*','admin_profiles.companyName as comName')
        //->where('user_id',$user_id)
        ->where('soundCompanyName',$soundCompanyName)
        //->get();
        ->first();
        

        return view('user.sound.singleComProduct',['sound'=>$sounds]);
    }
}


