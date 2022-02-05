<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentApiController extends Controller
{

    public function index(){
        $student = Student::all();
        return response()->json($student,200);
    }

    public function store(Request $request) {
        $validateData = Validator::make($request->all(),[
            'nim' => 'required|size:8,unique:students,nim',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);

        if($validateData->fails()){
            return response($validateData->errors(),400);
        }else {

            $mahasiswa = new Student();
            $mahasiswa->nim = $request->nim;
            $mahasiswa->name = $request->nama;
            $mahasiswa->gender = $request->jenis_kelamin;
            $mahasiswa->departement = $request->jurusan;
            $mahasiswa->address = $request->alamat;
            $mahasiswa->save();
            return response()->json([
                'message' => 'student record created'
            ], 201);
        }
    }

    public function update(Request $request, $id) {

        if(Student::where('id', $id)->exists()){
            $validateData = Validator::make($request->all(),[
                'nim' => 'required|size:8,unique:students,nim',
                'nama' => 'required|min:3|max:50',
                'jenis_kelamin' => 'required|in:P,L',
                'jurusan' => 'required',
                'alamat' => ' ',
            ]);

            if($validateData->fails()){
                return response($validateData->errors(),400);
            } else {
                $mahasiswa = Student::find($id);
                $mahasiswa->nim = $request->nim;
                $mahasiswa->name = $request->nama;
                $mahasiswa->gender = $request->jenis_kelamin;
                $mahasiswa->departement = $request->jurusan;
                $mahasiswa->address = $request->alamat;
                $mahasiswa->save();
                return response()->json([
                    'message' => 'student record updated'
                ], 201);
            }
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        
        if(Student::where('id', $id)->exists()){
            $mahasiswa = Student::find($id);
            $mahasiswa->delete();
            return response()->json([
                'message' => 'student record deleted'
            ], 404);
        } else {
            return response()->json([
                'message' => "Student not found"
            ], 404);
        }
    
    }
}
