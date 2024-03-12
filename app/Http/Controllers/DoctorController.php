<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //index
    public function index(Request $request){
        $doctors = DB::table('doctors')
        ->when($request->input('name'), function ($query, $doctor_name) {
            return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

     // create
     public function create(){
        return view('pages.doctors.create');
    }

    // store
    public function store(Request $request){
        try{
            $request->validate([
                'doctor_name' => 'required',
                'doctor_email'=> 'required|email',
                'doctor_phone'=> 'required',
                'doctor_specialist'=> 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'sip'=> 'required',
            ]);

            $doctor = new Doctor();
            $doctor->doctor_name = $request->doctor_name;
            $doctor->doctor_specialist = $request->doctor_specialist;
            $doctor->doctor_phone = $request->doctor_phone;
            $doctor->doctor_email = $request->doctor_email;
            if ($request->photo != null) {
                $filename = time() . $request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('images', $filename, 'public');
                $doctor->photo = '/storage/' . $path;
            } else {
                $doctor->photo = ""; // Atau apa pun yang Anda inginkan ketika tidak ada foto
            }
            $doctor->sip = $request->sip;
            $doctor->save();

            // DB::table('doctors')->insert([
            //     'doctor_name' => $request->doctor_name,
            //     'doctor_specialist' => $request->doctor_specialist,
            //     'doctor_phone' => $request->doctor_phone,
            //     'doctor_email' => $request->doctor_email,
            //     'sip' => $request->sip,
            // ]);

            return redirect()->route('doctors.index')->with('success','Doctor create successfully.');
        }catch (\Throwable $th) {
            // Log or handle the exception here
            return redirect()->back()->with('error', 'Failed to create doctor: ' . $th->getMessage());
        }

    }
     // show
     public function show($id){
        $doctor = DB::table('doctors')->where('id',$id)->first();
        return view('pages.doctors.show', compact('doctor'));
    }

    // edit
    public function edit($id){
        // $doctor = DB::table('doctors')->where('id',$id)->first();
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    // update
    public function update(Request $request, $id){

        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_specialist = $request->doctor_specialist;
        $doctor->doctor_phone = $request->doctor_phone;
        $doctor->doctor_email = $request->doctor_email;
        $doctor->sip = $request->sip;
        $doctor->save();

        // DB::table('doctors')->where('id',$id)->update([
        //     'doctor_name' => $request->doctor_name,
        //     'doctor_specialist' => $request->doctor_specialist,
        //     'doctor_phone' => $request->doctor_phone,
        //     'doctor_email' => $request->doctor_email,
        //     'sip' => $request->sip,
        // ]);
        return redirect()->route('doctors.index')->with('success','Doctor updated successfully.');
    }

    // destroy
    public function destroy($id){
        DB::table('doctors')->where('id',$id)->delete();
        return redirect()->route('doctors.index')->with('success','Doctor deleted successfully.');
    }
}
