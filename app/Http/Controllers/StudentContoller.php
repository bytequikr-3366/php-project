<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentContoller extends Controller
{
   public function index(){
      $data = array();
      $data['title'] = "Student List";
      $data['details_record']=Student::select('id','name','email','phone', 'status')->where('status', '!=', 2)->orderBy('id', 'asc')->get();
      return view('students.list',$data);
   }

   public function create(){      
      $data = array();
      $data['title'] = "Student List";
      $data['title2'] = "Add New Student";
      return view('students.addnew');
   }
   public function store(Request $request)
    {        

        $student=new Student();
        $student->name=$request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->status = 1;
        
        $student->save();            
            return redirect()->route('students.index')->with('success', 'Students added successfully.');
        
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.addnew', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone'=>'required'
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->save();

        return redirect()->route('students.index')->with('success', 'Students updated successfully.');
    }

    public function destroy($id)
    {
        // Find the Student by its ID
        $student = Student::find($id);
        // Check if student exists
        if ($student) {
            $student->status = 2;
            $student->save();
            return redirect()->route('students.index')->with('success', 'Student marked as deleted successfully.');
        }

        // If country not found
        return redirect()->route('students.index')->with('error', 'Student not found.');
    }
}
