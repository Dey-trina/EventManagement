<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Redirect;
use View;
use Image;
use File;
use Auth;
use App\venue;
use App\User;
use DB;


class VenueController extends Controller
{
    public function index()
    {
    	return view('admin.venue.addvenue');
    }

    public function save(Request $request){
    	
    	// open this view file from where images are selected
    	//echo $lastId;
        if($request->hasFile('image'))
        {
    	$pictureInfo=$request->file('image');
        $array_len=count($pictureInfo);
        // dd($array_len);
        // show this view in browser
        //echo $array_len;

        for($i=0 ;$i<$array_len; $i++)
        {
            $userId=Auth::user()->id;
            $image_ext=$pictureInfo[$i]->getClientOriginalExtension();
           //echo  $image_ext."<br/>";
            $folder="venue/";
            $new_image_name=$folder.rand(123456,999999).".".$image_ext;
            $destination_path=public_path('/venue');
            $pictureInfo[$i]->move( $destination_path,$new_image_name); // is this working? yes sir
            $venueEntry=new venue();
            $lastId=$venueEntry->id;
            $venueEntry->user_id=$userId;
            $venueEntry->eventType=$request->eventType;
            $venueEntry->venueName=$request->name;
            $venueEntry->cost=$request->price;
            $venueEntry->image=$new_image_name;
            $venueEntry->location=$request->location;
        
            $venueEntry->save();
        }
             return redirect('/venue/addvenue')->with('message','Venue insert successfully!');
             // sob gulo images kon function theke query kore ancho?
}





















    	//
        //echo "<pre>";
    	//print_r($pictureInfo);
    	//echo "</pre>";
    	//$picName=$lastId.$pictureInfo->getClientOriginalName();
    	//echo $picName;
   	 	//$folder="productImage/";
    	//$pictureInfo->move($folder,$picName);
    	////$picUrl=$folder.$picName;
    	//$productPic=Venue::find($lastId);
    	//$productPic->image=$picUrl;
    	//$productPic->save();
    	//return redirect('/venue/addvenue')->with('message','Venue insert successfully!');
    	
    
    }




  public function manage()
    {       
            $userId=Auth::user()->id;
            $venues= DB::table('venues')->distinct()->select('user_id','eventType','venueName','cost')
            ->where('venues.user_id',$userId)
            ->paginate(3);        

            
        

        return view('admin.venue.venueManage',['venues'=>$venues]);
    }

    public function singleProduct($user_id,$venueName)
    {
        //$userId=Auth::user()->id;
        $venues=DB::table('venues')
        ->select('*')
        ->where('venueName',$venueName)
        ->where('user_id',$user_id)
        ->get();

         // dd($venues);
        

        return view('admin.venue.singleProduct',['venues'=>$venues]);
    }

  public function editProduct($venueName)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $venue=venue::where('venueName',$venueName)->first();
        //->first();

        return view('admin.venue.venueEdit',['venue'=>$venue]);
    }
    public function updateProduct( Request $request)
    {
            $old_venue_name = $request->hdn_venue_name;
            // $venue=venue::where('id',$request->venue_id)->first();
            // dd($venue);
            $venue =  DB::table('venues')
                            ->select('*')
                            ->where('venueName',$old_venue_name)
                            ->get();
            //dd($venue);
            // now both the images are coming . you need to make a loop through the rows and delete the files
                            // but this is not a good approach
                        
           
               if($request->hasFile('image[]'))
               {
                    $picInfo=$request->file('image[]');
                    //dd($picInfo);
                    // if(file_exists($venue->image)){
                    //     unlink($venue->image);
                    //     // File::delete($venue->image);  
                    // }
                    //echo "update";
                    unlink($venue->image);
                    $picName=$picInfo->getClientOriginalName();
                    $path="venue/";
                    $picUrl=$path.$picName;
                    $picInfo->move($path,$picName);
               }
               else
               {
                //echo "not";
                $picUrl=$venue->image;
               }
               // dd($picUrl);
                // $venue=venue::find($request->venue_id);
                //  $venue->eventType=$request->eventType;
                // $venue->venueName=$request->name;
                // $venue->cost=$request->price;
                // $venue->image=$picUrl;
                // $venue->save();
               DB::table('venues')
                ->where('id',$request->venue_id)
                ->update(['eventType'=>$request->eventType,'venueName'=>$request->name,'cost'=>$request->price,'image'=>$picUrl]);
                return redirect('/venue/venue_manage')->with('message','Venues Updated Successfully!');

    }
       public function delete($id)
    {
        //$userId=Auth::user()->id;
        $venue=venue::where('id',$id)->first();

        //echo $food;
        if(file_exists($venue->image))
        {
            unlink($venue->image);
        }
        $productDelete=venue::findOrFail($id);
        //echo $productDelete;
        $productDelete->delete();
        return redirect('/venue/venue_manage')->with('message','Venues Deleted Successfully!');
       
}




//user

  public function user_manage()
    {       
            $userId=Auth::user()->id;
            $venues= DB::table('venues')
            ->distinct()
            ->select('user_id','eventType','venueName','cost')
            //->where('venues.user_id',$userId)
            ->paginate(7);        

            
        

        return view('user.venue.venueManage',['venues'=>$venues]);
    }

    public function user_singleProduct($user_id,$venueName)
    {
        //$userId=Auth::user()->id;
        $venues=DB::table('venues')
        ->join('admin_profiles','admin_profiles.user_id','venues.user_id')
        ->select('venues.*','admin_profiles.companyName as comName')
        ->where('venueName',$venueName)
        //->where('user_id',$user_id)
        ->get();

         // dd($venues);
        

        return view('user.venue.singleProduct',['venues'=>$venues]);
    }
//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $venues=DB::table('venues')->where('venueName','like','%'.$search.'%')
        ->orWhere('cost','like','%'.$search.'%')
         ->orWhere('location','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.venue.venueManage',['venues'=>$venues]);
    }
//com
     public function com_manage($user_id)
    {       
            //$userId=Auth::user()->id;
            $a=$user_id;
            $venues= DB::table('venues')
            ->distinct()
            ->select('user_id','eventType','venueName','cost')
            ->where('venues.user_id',$a)
            ->paginate(7);        
        return view('user.venue.venueComManage',['venues'=>$venues]);
    }
   

    public function com_singleProduct($user_id,$venueName)
    {
        //$userId=Auth::user()->id;
        $venues=DB::table('venues')
        ->join('admin_profiles','admin_profiles.user_id','venues.user_id')
        ->select('venues.*','admin_profiles.companyName as comName')
        ->where('venueName',$venueName)
        //->where('user_id',$user_id)
        ->get();        

        return view('user.venue.singleComProduct',['venues'=>$venues]);
    }
 

}