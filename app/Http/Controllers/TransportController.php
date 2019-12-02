<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\transport;
use App\User;
use DB;

class TransportController extends Controller
{
      public function index()
    {
    	return view('admin.transport.addtransport');
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
            $destination_path=public_path('/transport');
            $pictureInfo[$i]->move( $destination_path,$new_image_name);
            $transportEntry=new Transport();
            $lastId=$transportEntry->id;
            $transportEntry->user_id=$userId;
            $transportEntry->vehicleName=$request->name;
            $transportEntry->cost=$request->price;
            $transportEntry->vehicleImage=$new_image_name;
        
            $transportEntry->save();
        }*/
$userId=Auth::user()->id;
         $transportEntry=new transport();
         //$lastId=$foodEntry->id;
        $transportEntry->user_id=$userId;
         $transportEntry->eventType=$request->eventType;
         $transportEntry->vehicleName=$request->name;
            $transportEntry->cost=$request->price;
         $transportEntry->vehicleImage='image';
       
        
          $transportEntry->save();
        $lastId= $transportEntry->id;
        //echo $lastId;
        $pictureInfo=$request->file('image');
        //echo "<pre>";
        //print_r($pictureInfo);
        //echo "</pre>";
        $picName=$lastId.$pictureInfo->getClientOriginalName();
        //echo $picName;
        $folder="transport/";
        $pictureInfo->move($folder,$picName);
        $picUrl=$folder.$picName;
        $productPic=transport::find($lastId);
        $productPic->vehicleImage=$picUrl;
        $productPic->save();






















            return redirect('/transport/addtransport')->with('message','New Vehicle insert successfully!');

}
public function manage()
    {       
            $userId=Auth::user()->id;
            $transports= DB::table('transports')->distinct()->select('id','user_id','eventType','vehicleName','cost','vehicleImage')
            ->where('transports.user_id',$userId)
            //->get()
            ->paginate(7);
            
            
        

        return view('admin.transport.transportManage',['transports'=>$transports]);
    }
    public function singleProduct($user_id,$vehicleName)
    {
        //$userId=Auth::user()->id;
        $transports=DB::table('transports')
        ->select('*')
        ->where('vehicleName',$vehicleName)
        ->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('admin.transport.singleProduct',['transport'=>$transports]);
    }

  public function editProduct($vehicleName)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $transport=transport::where('vehicleName',$vehicleName)->first();
        //->first();

        return view('admin.transport.transportEdit',['transport'=>$transport]);
    }
    public function updateProduct( Request $request)
    {
            
            $transport=transport::where('id',$request->transport_id)->first();
           
               if($picInfo=$request->file('image'))
               {
                if(file_exists($transport->vehicleImage)){
                  unlink($transport->vehicleImage);  
                }
                //echo "update";
                $picName=$picInfo->getClientOriginalName();
                $path="transport/";
                $picUrl=$path.$picName;
                $picInfo->move($path,$picName);
               }
               else
               {
                //echo "not";
                $picUrl=$transport->vehicleImage;
               }
               
                $transport=transport::find($request->transport_id);
                $transport->eventType=$request->eventType;
                $transport->vehicleName=$request->name;
                $transport->cost=$request->price;
                $transport->vehicleImage=$picUrl;
                $transport->save();
                return redirect('/transport/transport_manage')->with('message','Transports Updated Successfully!');
              
               
              

    }


   public function delete($id)
    {
        //$userId=Auth::user()->id;
        $transport=transport::where('id',$id)->first();

        //echo $food;
        if(file_exists($transport->vehicleImage))
        {
            unlink($transport->vehicleImage);
        }
        $productDelete=transport::findOrFail($id);
        //echo $productDelete;
        $productDelete->delete();
        return redirect('/transport/transport_manage')->with('message','Transports Successfully!');
       
}

//user

public function user_manage()
    {       
            $userId=Auth::user()->id;
            $transports= DB::table('transports')
            //->distinct()
            ->select('id','user_id','eventType','vehicleName','cost','vehicleImage')
            //->where('transports.user_id',$userId)
            //->get()
            ->paginate(5);
            
            
        

        return view('user.transport.transportManage',['transports'=>$transports]);
    }
    public function user_singleProduct($user_id,$vehicleName)
    {
        //$userId=Auth::user()->id;
        $transports=DB::table('transports')
        ->join('admin_profiles','admin_profiles.user_id','transports.user_id')
        ->select('transports.*','admin_profiles.companyName as comName')
        ->where('vehicleName',$vehicleName)
        //->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('user.transport.singleProduct',['transport'=>$transports]);
    }

//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $transports=DB::table('transports')->where('vehicleName','like','%'.$search.'%')
        ->orWhere('cost','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.transport.transportManage',['transports'=>$transports]);
    }

//com
    public function com_manage($user_id)
    {       
            //$userId=Auth::user()->id;
         $a=$user_id;
            $transports= DB::table('transports')
            //->distinct()
            ->select('id','user_id','eventType','vehicleName','cost','vehicleImage')
            ->where('user_id',$a)
            //->get()
            ->paginate(5);
            
            
        

        return view('user.transport.transportComManage',['transports'=>$transports]);
    }
    public function com_singleProduct($user_id,$vehicleName)
    {
        //$userId=Auth::user()->id;
        $transports=DB::table('transports')
        ->join('admin_profiles','admin_profiles.user_id','transports.user_id')
        ->select('transports.*','admin_profiles.companyName as comName')
        ->where('vehicleName',$vehicleName)
        //->where('user_id',$a)
        //->get();
        ->first();
        

        return view('user.transport.singleComProduct',['transport'=>$transports]);
    }

}


