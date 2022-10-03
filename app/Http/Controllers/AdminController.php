<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\appoint;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adddoctor(){

        $showdoctors = Doctor::orderBy('id','desc')->paginate(2);
        if(Auth::id()){
        if(Auth::User()->usertype == '1' ){

            return view('admin.adddoctor',compact('showdoctors'));
        }else{
            return redirect()-> back();
        }
    }else{

        return redirect()-> back();
    }


    }
    public function insertdoctor(Request $request){

          $request -> validate([


            'name' => 'required' ,
            'phone' => 'required | min:3' ,
            'room' => 'required' ,
            'image' => 'required' ,


          ],
          [  ' name.required' => 'you have to fill the name' ,
            ' phone.required' => 'you have to fill the phone' ,
            ' image.required' => 'you have to fill the image' ,
            ' phone.min' => 'you have to fill the phone with 3 number' ,]);

              $insertdoctor = new Doctor();
              $insertdoctor -> name = $request -> name;
              $insertdoctor -> phone = $request -> phone;
              $insertdoctor -> room = $request -> room;
              $insertdoctor -> speciality = $request -> speciality;
              $image = $request -> file('image');

              if($image){
                  $imname = Str::slug($request -> name);
                  $imgex= $image -> getClientOriginalExtension();
                  $imagename = $imname.'-'.time().'.'.$imgex;
                  $impath = 'images/doctorimage/' ;
                  $upload =  $image -> move($impath,$imagename);
                  $insertdoctor -> image =  $imagename;


              }
              $insertdoctor -> save();
              return redirect() -> back() -> with('success', 'data inserted');





    }

    public function editdoctor($id){

         $editdoc = Doctor::where('id',$id)->first();
         if(Auth::id()){
            if(Auth::User()->usertype == '1' ){
                return view('admin.editdoctor',compact('editdoc'));
            }else{
               return redirect()-> back();
            }

         }else{

            return redirect()-> back();
         }


    }

   //doc update
   public function updatedoctor(Request $request,$id){

    $dataupdate= Doctor::where('id',$id)->first();
    $request -> validate([
        'name' => 'required' ,
        'phone' => 'required | min:3' ,
        'room' => 'required' ,



      ],
      [  ' name.required' => 'you have to fill the name' ,
        ' phone.required' => 'you have to fill the phone' ,
        ' image.required' => 'you have to fill the image' ,
        ' phone.min' => 'you have to fill the phone with 3 number'  ,
       ]
);
$dataupdate -> name = $request -> name ;
  $dataupdate -> phone = $request -> phone ;
  $dataupdate -> room = $request -> room ;
  $dataupdate -> speciality = $request -> speciality ;
     if($request->hasFile('image'))
     {
         unlink(public_path('images/doctorimage/'.$dataupdate->image));

         $image = $request -> file('image') ;
  if($image){

    $imname = Str::slug($request -> name);
                  $imgex= $image -> getClientOriginalExtension();
                  $imagename = $imname.'-'.time().'.'.$imgex;
                  $impath = 'images/doctorimage/' ;
                  $upload =  $image -> move($impath,$imagename);
                  $dataupdate -> image =  $imagename;

}

     }







  $dataupdate -> update();
  return redirect() -> back() -> with('success', 'data updated');

   }

   //doc del
   public function deldoctor($id){

    $data = Doctor::where('id',$id)->first();


if(file_exists(public_path('images/doctorimage/'.$data->image)))
{

unlink(public_path('images/doctorimage/'.$data->image));
}


    $data -> delete();
    return redirect()->back()->with('success', 'data deleted');

     }



//appo
public function insertappo(Request $request){

    $request -> validate([
        'name' => 'required' ,
        'phone' => 'required | min:3' ,



      ],
      [  ' name.required' => 'you have to fill the name' ,
        ' phone.required' => 'you have to fill the phone' ,
     ]);

     $insertappo = new appoint();
     $insertappo -> name = $request -> name;
     $insertappo -> phone = $request -> phone;
     $insertappo -> email = $request -> email;
     $insertappo -> doctor = $request -> doctor;
     $insertappo -> date = $request -> date;
     $insertappo -> msg = $request -> msg;

     if(Auth::id()){

        $insertappo -> user_id = Auth::User()->id;

     }

     $insertappo -> save();

     return redirect() -> back() -> with('success', 'data inserted');







}




//show

public function showappo(){

    if(Auth::id()){


        $userid =  Auth::User()->id;
        $appo = appoint::where('user_id',$userid) -> get();
        return view('myappo', compact('appo'));

     }
     else{
        return redirect()->back();
     }






}

//del

public function delappo($id){

    $del = appoint::find($id);
    $del ->delete();

    return redirect()-> back();






}

//admin app


public function adminappo(){

    $appos = appoint::get();
    if(Auth::id()){
        if(Auth::User()->usertype == '1' ){
            return view('admin.appoint', compact('appos'));

        }else{
          return redirect()-> back();
        }


    }else{
        return redirect()-> back();
    }



     }



//approved by admin

public function approvedappo($id){




    $approved = appoint::find($id);
    $approved -> status = 'apporved' ;
    $approved -> save();
    return redirect()-> back();

 }

 public function cancelappo($id){




    $approved = appoint::find($id);
    $approved -> status = 'Declined' ;
    $approved -> save();
    return redirect()-> back();

 }







}

