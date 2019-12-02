<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\decoration;
use App\User;
use DB;
class DecorationController extends Controller
{
     public function index()
    {
    	return view('admin.decoration.adddecoration');
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
            $destination_path=public_path('/decoration');
            $pictureInfo[$i]->move( $destination_path,$new_image_name);
            $decorationEntry=new Decoration();
            $lastId= $decorationEntry->id;
             $decorationEntry->user_id=$userId;
             $decorationEntry->decorationCode=$request->code;
             $decorationEntry->cost=$request->price;
            $decorationEntry->decorationImage=$new_image_name;
             $decorationEntry->decorationType=$request->decorationType;
        
            $decorationEntry->save();
        }
            return redirect('/decoration/adddecoration')->with('message','New Design insert successfully!');
}
*/



        $userId=Auth::user()->id;
         $decorationEntry=new decoration();
         //$lastId=$foodEntry->id;
        $decorationEntry->user_id=$userId;
        $decorationEntry->eventType=$request->eventType;
         $decorationEntry->decorationCode=$request->code;
            $decorationEntry->cost=$request->price;
        $decorationEntry->decorationImage='image';
        $decorationEntry->decorationType=$request->decorationType;
        
         $decorationEntry->save();
        $lastId= $decorationEntry->id;
        //echo $lastId;
        $pictureInfo=$request->file('image');
        //echo "<pre>";
        //print_r($pictureInfo);
        //echo "</pre>";
        $picName=$lastId.$pictureInfo->getClientOriginalName();
        //echo $picName;
        $folder="decoration/";
        $pictureInfo->move($folder,$picName);
        $picUrl=$folder.$picName;
        $productPic=decoration::find($lastId);
        $productPic->decorationImage=$picUrl;
        $productPic->save();




    return redirect('/decoration/adddecoration')->with('message','New Design insert successfully!');




}
public function manage()
    {       
            $userId=Auth::user()->id;
            $decorations= DB::table('decorations')->distinct()->select('id','user_id','eventType','decorationCode','cost','decorationImage','decorationType')
            ->where('decorations.user_id',$userId)
            //->get()
            ->paginate(7);
            
            
        

        return view('admin.decoration.decorationManage',['decorations'=>$decorations]);
    }
    public function singleProduct($user_id,$decorationCode)
    {
        //$userId=Auth::user()->id;
        $decorations=DB::table('decorations')
        ->select('*')
        ->where('decorationCode',$decorationCode)
        ->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('admin.decoration.singleProduct',['decoration'=>$decorations]);
    }
  public function editProduct($decorationCode)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $decoration=decoration::where('decorationCode',$decorationCode)->first();
        //->first();

        return view('admin.decoration.decorationEdit',['decoration'=>$decoration]);
    }
    public function updateProduct( Request $request)
    {
            
            $decoration=decoration::where('id',$request->decoration_id)->first();
           
               if($picInfo=$request->file('image'))
               {
                if(file_exists($decoration->decorationImage)){
                  unlink($decoration->decorationImage);  
                }
                //echo "update";
                $picName=$picInfo->getClientOriginalName();
                $path="decoration/";
                $picUrl=$path.$picName;
                $picInfo->move($path,$picName);
               }
               else
               {
                //echo "not";
                $picUrl=$decoration->decorationImage;
               }
               
                $decoration=decoration::find($request->decoration_id);
                $decoration->eventType=$request->eventType;
                $decoration->decorationCode=$request->code;
                $decoration->cost=$request->price;
                $decoration->decorationImage=$picUrl;
                $decoration->decorationType=$request->decorationType;
                $decoration->save();
                return redirect('/decoration/decoration_manage')->with('message','Decoration Designs Updated Successfully!');
              
               
              

    }
       public function delete($id)
    {
        //$userId=Auth::user()->id;
        $decoration=decoration::where('id',$id)->first();

        //echo $food;
        if(file_exists($decoration->decorationImage))
        {
            unlink($decoration->decorationImage);
        }
        $productDelete=decoration::findOrFail($id);
        //echo $productDelete;
        $productDelete->delete();
        return redirect('/decoration/decoration_manage')->with('message','Decoration Designs Deleted Successfully!');
       
}


//user

public function user_manage()
    {       
            $userId=Auth::user()->id;
            $decorations= DB::table('decorations')
            //->distinct()
            ->select('id','user_id','eventType','decorationCode','cost','decorationImage','decorationType')
            //->where('decorations.user_id',$userId)
            //->get()
            ->paginate(5);
            
            
        

        return view('user.decoration.decorationManage',['decorations'=>$decorations]);
    }
    public function user_singleProduct($user_id,$decorationCode)
    {
        //$userId=Auth::user()->id;
        $decorations=DB::table('decorations')
        ->join('admin_profiles','admin_profiles.user_id','decorations.user_id')
        ->select('decorations.*','admin_profiles.companyName as comName')
        ->where('decorationCode',$decorationCode)
        //->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('user.decoration.singleProduct',['decoration'=>$decorations]);
    }


//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $decorations=DB::table('decorations')
        ->Where('cost','like','%'.$search.'%')
        ->orWhere('decorationType','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.decoration.decorationManage',['decorations'=>$decorations]);
    }


    //com
    public function com_manage($user_id)
    {       
            $a=$user_id;
            //$userId=Auth::user()->id;
            $decorations= DB::table('decorations')
            //->distinct()
            ->select('id','user_id','eventType','decorationCode','cost','decorationImage','decorationType')
            ->where('decorations.user_id',$a)
            //->get()
            ->paginate(5);
            
            
        

        return view('user.decoration.decorationComManage',['decorations'=>$decorations]);
    }
    public function com_singleProduct($user_id,$decorationCode)
    {
        //$userId=Auth::user()->id;
        $decorations=DB::table('decorations')
        ->join('admin_profiles','admin_profiles.user_id','decorations.user_id')
        ->select('decorations.*','admin_profiles.companyName as comName')
        ->where('decorationCode',$decorationCode)
        //->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('user.decoration.singleComProduct',['decoration'=>$decorations]);
    }

}

