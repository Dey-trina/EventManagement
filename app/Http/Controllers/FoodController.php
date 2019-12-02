<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\food;
use App\User;
use DB;

class FoodController extends Controller
{
     public function index()
    {
    	return view('admin.food.addfood');
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
            $destination_path=public_path('/food');
            $pictureInfo[$i]->move( $destination_path,$new_image_name);
            $foodEntry=new Food();
            $lastId=$foodEntry->id;
            $foodEntry->user_id=$userId;
            $foodEntry->foodName=$request->name;
            $foodEntry->cost=$request->price;
            $foodEntry->foodImage=$new_image_name;
        
            $foodEntry->save();
        }*/



//dd($request->all());
        $userId=Auth::user()->id;
         $foodEntry=new food();
         //$lastId=$foodEntry->id;
        $foodEntry->user_id=$userId;
        $foodEntry->eventType=$request->eventType;
        $foodEntry->foodName=$request->name;
        $foodEntry->cost=$request->price;
        $foodEntry->foodImage='image';
        $foodEntry->foodType=$request->foodType;
        $foodEntry->foodDescription=$request->foodDescription;
        $foodEntry->save();
        $lastId=$foodEntry->id;
        //echo $lastId;
        $pictureInfo=$request->file('image');
        //echo "<pre>";
        //print_r($pictureInfo);
        //echo "</pre>";
        $picName=$lastId.$pictureInfo->getClientOriginalName();
        //echo $picName;
        $folder="food/";
        $pictureInfo->move($folder,$picName);
        $picUrl=$folder.$picName;
        $productPic=food::find($lastId);
        $productPic->foodImage=$picUrl;
        $productPic->save();
        return redirect('/food/addfood')->with('message','Food insert successfully!');
}













public function manage()
    {       
            $userId=Auth::user()->id;
            $foods= DB::table('foods')->distinct()->select('id','user_id','eventType','foodName','cost','foodImage','foodType','foodDescription')
            ->where('foods.user_id',$userId)
            //->get()
            ->paginate(7);
            
            
        

        return view('admin.food.foodManage',['foods'=>$foods]);
    }
    public function singleProduct($user_id,$foodName)
    {
        //$userId=Auth::user()->id;
        $foods=DB::table('foods')
        ->select('*')
        ->where('foodName',$foodName)
        ->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('admin.food.singleProduct',['food'=>$foods]);
    }




      public function editProduct($foodName)
    {
        //echo $id;
       // $food=DB::table('foods')
        //$food=Food::find($foodName);
         $food=food::where('foodName',$foodName)->first();
        //->first();

        return view('admin.food.foodEdit',['food'=>$food]);
    }
    public function updateProduct( Request $request)
    {
            
            $food=food::where('id',$request->food_id)->first();
           
               if($picInfo=$request->file('image'))
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
               }
               
                $food=food::find($request->food_id);
                $food->eventType=$request->eventType;
                $food->foodName=$request->name;
                $food->cost=$request->price;
                $food->foodImage=$picUrl;
                $food->foodType=$request->foodType;
                $food->foodDescription=$request->foodDescription;
                $food->save();
                return redirect('/food/food_manage')->with('message','Food Item Updated Successfully!');
                     

    }


     public function delete($id)
    {
        //$userId=Auth::user()->id;
        $food=food::where('id',$id)->first();

        //echo $food;
        if(file_exists($food->foodImage))
        {
            unlink($food->foodImage);
        }
        $productDelete=food::findOrFail($id);
        //echo $productDelete;
        $productDelete->delete();
        return redirect('/food/food_manage')->with('message','Product Deleted Successfully!');
       
}

//for user


public function user_manage()
    {       
            $userId=Auth::user()->id;
            $foods= DB::table('foods')
            //->distinct()
            ->select('id','user_id','eventType','foodName','cost','foodImage','foodType','foodDescription')
            //->where('foods.user_id',$userId)
            //->get()
            ->paginate(5);
            
            
        return view('user.food.foodManage',['foods'=>$foods]);
    }

  public function user_singleProduct($user_id,$foodName)
    {
        //$userId=Auth::user()->id;
        $foods=DB::table('foods')
        ->join('admin_profiles','admin_profiles.user_id','foods.user_id')
        ->select('foods.*','admin_profiles.companyName as comName')
        ->where('foodName',$foodName)
        //->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('user.food.singleProduct',['food'=>$foods]);
    }


//search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $foods=DB::table('foods')->where('foodName','like','%'.$search.'%')
        ->orWhere('cost','like','%'.$search.'%')
        ->orWhere('foodType','like','%'.$search.'%')
        ->orWhere('eventType','like','%'.$search.'%')
        ->paginate(5);
        return view('user.food.foodManage',['foods'=>$foods]);
    }

//com
    public function com_manage($user_id)
    {       
            //$userId=Auth::user()->id;
            $a=$user_id;
            $foods= DB::table('foods')
            //->distinct()
            ->select('id','user_id','eventType','foodName','cost','foodImage','foodType','foodDescription')
            ->where('foods.user_id',$a)
            //->get()
            ->paginate(5);
            
            
        return view('user.food.foodComManage',['foods'=>$foods]);
    }

  public function com_singleProduct($user_id,$foodName)
    {
        //$userId=Auth::user()->id;
        $foods=DB::table('foods')
        ->join('admin_profiles','admin_profiles.user_id','foods.user_id')
        ->select('foods.*','admin_profiles.companyName as comName')
        ->where('foodName',$foodName)
        //->where('user_id',$user_id)
        //->get();
        ->first();
        

        return view('user.food.singleComProduct',['food'=>$foods]);
    }

}