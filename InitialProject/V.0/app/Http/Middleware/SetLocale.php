<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // ตรวจสอบว่าใน session มีค่าภาษาอยู่หรือไม่
        $locale = Session::get('locale', 'en'); // ถ้าไม่มีจะใช้ภาษา 'en' เป็นค่าเริ่มต้น
        App::setLocale($locale);

        return $next($request);
    }
}

