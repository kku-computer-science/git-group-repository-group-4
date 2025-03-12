<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLanguage($lang)
    {
        // ตั้งค่าภาษาใหม่ใน session
        Session::put('locale', $lang);

        // ตั้งค่าภาษาใน Laravel
        App::setLocale($lang);

        // เปลี่ยนกลับไปยังหน้าที่ผู้ใช้มาจาก
        return redirect()->back();
    }
}
