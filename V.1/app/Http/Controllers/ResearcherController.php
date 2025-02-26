<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    public function index()
    {
        //$reshr = User::role('teacher')->orderBy('department_id')->with('Expertise')->get();
        //$reshr = Department::with(['users' => fn($query) => $query->where('fname', 'like', 'wat%')])->get();
        $reshr = Program::with(['users' => function ($query) {
            return $query->role('teacher')->with('expertise');
        }])

        
        ->where('degree_id', '=', 1)
        ->get();

        //$reshr = Department::with('users')->join('expertises', 'id', '=', 'expertises.user_id')->get();

        //return view('researchers',compact('reshr'));
    }
    public function request($id)
    {
        //$res=User::where('id',$id)->with('paper')->get();
        //User::with(['paper'])->where('id',$id)->get();
        //$paper = User::with(['paper','author'])->where('id',$id)->get();
        $user1 = User::role('teacher')->where('position_th', 'ศ.ดร.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        $user2 = User::role('teacher')->where('position_th', 'รศ.ดร.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        $user3 = User::role('teacher')->where('position_th', 'ผศ.ดร.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        $user4 = User::role('teacher')->where('position_th', 'ศ.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        $user5 = User::role('teacher')->where('position_th', 'รศ.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        $user6 = User::role('teacher')->where('position_th', 'ผศ.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        $user7 = User::role('teacher')->where('position_th', 'อ.ดร.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        $user8 = User::role('teacher')->where('position_th', 'อ.')->with('program')->whereHas('program', function($q) use($id){
            $q->where('id', '=', $id);
        })->orderBy('fname_en')->get();
        
        $users = collect([...$user1, ...$user4, ...$user2, ...$user5, ...$user3, ...$user6, ...$user7, ...$user8]);
        //return $users;
        // $request = Program::with(['users' => fn($query) => 
        // //$query->role('teacher')->orderByRaw("FIELD(position_en , 'Prof. Dr.' as 1, 'Assoc. Prof. Dr.' as 2, 'Asst. Prof. Dr.' as 3,'Assoc. Prof.' as 4, 'Asst. Prof.' as 5, 'Dr.' as 6,'Lecturer' as 7) ASC")
        // $query->role('teacher')->orderByRaw("FIELD(position_en , 'Prof. Dr.' , 'Assoc. Prof. Dr.' , 'Asst. Prof. Dr.' ,'Assoc. Prof.' , 'Asst. Prof.' , 'Dr.' ,'Lecturer' )")
        // ->with('expertise')])
        // ->where('degree_id', '=', 1, 'and')->where('id','=',$id)->get();
        $request = Program::where('id','=',$id)->get();
        // $request = Program::with('users')->whereHas('users', function (Builder $query) {
        //     $query->role('teacher')->where('position_en', '==', 'Prof. Dr.');
        //     });
        //return $request;
        //$user = User::orderByRaw("FIELD(position_en , '	Prof. Dr.', 'Assoc. Prof. Dr.', 'Asst. Prof. Dr.','Assoc. Prof.', 'Asst. Prof.', 'Dr.','Lecturer') ASC");
        //return $request;
        return view('researchers', compact('request','users'));
    }
    public function search(Request $request)
    {
        $searchTerm = trim($request->input('textsearch'));
    
        if ($searchTerm) {
            try {
                $users = User::where(function ($query) use ($searchTerm) {
                    $query->where('fname_en', 'LIKE', '%' . strtolower($searchTerm) . '%')
                          ->orWhere('lname_en', 'LIKE', '%' . strtolower($searchTerm) . '%')
                          ->orWhere('position_th', 'LIKE', '%' . strtolower($searchTerm) . '%')
                          ->orWhere('email', 'LIKE', '%' . strtolower($searchTerm) . '%')
                          ->orWhereHas('program', function ($q) use ($searchTerm) {
                              $q->where('program_name_en', 'LIKE', '%' . strtolower($searchTerm) . '%')
                                ->orWhere('program_name_th', 'LIKE', '%' . strtolower($searchTerm) . '%');
                          })
                          ->orWhereHas('expertise', function ($q) use ($searchTerm) {
                              $q->where('expert_name', 'LIKE', '%' . strtolower($searchTerm) . '%');
                          });
                })
                ->with(['program', 'expertise'])
                ->get();
    
                // ตรวจสอบผลลัพธ์
                if ($users->isEmpty()) {
                    $message = 'ไม่พบผลลัพธ์ที่ตรงกับการค้นหา';
                } else {
                    $message = null;
                }
    
            } catch (\Exception $e) {
                // Handle error
                $message = $e->getMessage();
                $users = collect();
            }
        } else {
            // ไม่มีคำค้นหา ให้ดึงข้อมูลทั้งหมด
            $users = User::with(['program', 'expertise'])->get();
            $message = null;
        }
    
        return view('researchers', compact('users', 'message'));
    }
    

    
    public function allResearchers(Request $request)
    {
        $programs = Program::whereIn('program_name_en', [
            'Computer Science',
            'Infomation Technology',
            'Geo-Informatics',
            'Artificial Intelligence',
            'Cybersecurity'
        ])
        ->where('degree_id', 1) // เลือกเฉพาะ Degree ID = 1
        ->distinct('program_name_en') // ลบคณะที่ซ้ำกัน
        ->get();
    
        // ดึงข้อมูลนักวิจัย (อาจารย์)
        $query = User::whereNotNull('academic_ranks_en') // ดึงเฉพาะอาจารย์
            ->with(['program', 'expertise'])
            ->orderByRaw("FIELD(academic_ranks_en, 'Professor', 'Associate Professor', 'Assistant Professor', 'Lecturer')");
    
        // ดึงข้อมูลนักศึกษา (student)
        $studentsQuery = User::whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->with('program');
    
        if ($request->has('program_id') && $request->program_id !== 'all') {
            $query->where('program_id', $request->program_id);
            $studentsQuery->where('program_id', $request->program_id);
        }
    
        $users = $query->get();
        $students = $studentsQuery->get(); // ได้เฉพาะนักศึกษา
    
        return view('researchers', compact('users', 'students', 'programs'));
    }
}