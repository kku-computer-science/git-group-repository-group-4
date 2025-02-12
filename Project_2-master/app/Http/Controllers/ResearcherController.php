<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    public function allResearchers(Request $request, $id = null) // รับ parameter id แบบ optional
    {
        $textSearch = $request->textsearch;

        $users = User::role('teacher')
            ->with(['program', 'expertise'])
            ->when($textSearch, function ($query) use ($textSearch) {
                $query->whereHas('expertise', function ($q) use ($textSearch) {
                    $q->where('expert_name', 'LIKE', "%{$textSearch}%");
                });
            })
            ->when($id, function ($query) use ($id) { // เพิ่มเงื่อนไข when สำหรับ id
                $query->whereHas('program', function ($q) use ($id) {
                    $q->where('id', $id);
                });
            })
            ->orderByRaw("FIELD(position_th, 'ศ.ดร.', 'รศ.ดร.', 'ผศ.ดร.', 'ศ.', 'รศ.', 'ผศ.', 'อ.ดร.', 'อ.')")
            ->get();

        $programs = Program::all();

        $currentProgram = $id ? Program::find($id) : null; // กำหนด $currentProgram

        return view('researchers', compact('users', 'programs', 'currentProgram'));
    }

    public function request(Request $request, $id) // ไม่ได้ใช้งานแล้ว
    {
        // โค้ดส่วนนี้ไม่ได้ใช้งานแล้ว เพราะรวม logic ไปอยู่ใน allResearchers
        // แต่ถ้าต้องการเก็บไว้ สามารถทำได้ดังนี้

        $textSearch = $request->textsearch;

        $users = User::role('teacher')
            ->with(['program', 'expertise'])
            ->whereHas('program', function ($q) use ($id) {
                $q->where('id', $id);
            })
            ->when($textSearch, function ($query) use ($textSearch) {
                $query->whereHas('expertise', function ($q) use ($textSearch) {
                    $q->where('expert_name', 'LIKE', "%{$textSearch}%");
                });
            })
            ->orderByRaw("FIELD(position_th, 'ศ.ดร.', 'รศ.ดร.', 'ผศ.ดร.', 'ศ.', 'รศ.', 'ผศ.', 'อ.ดร.', 'อ.')")
            ->get();

        $programs = Program::all();

        $currentProgram = Program::find($id);

        return view('researchers', compact('users', 'programs', 'currentProgram'));
    }
}