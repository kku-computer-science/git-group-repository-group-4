<?php

use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkOfResearchGroupTest extends TestCase
{
    use DatabaseTransactions; // ใช้ Transactions แทน RefreshDatabase

    public function test_fetch_work_of_research_groups()
    {
        // ✅ Insert ข้อมูลโดยไม่ใส่ created_at / updated_at
        DB::table('work_of_research_groups')->insert([
            'role' => 1,
            'user_id' => 2,
            'research_group_id' => 10
        ]);

        // ✅ Query ดึงข้อมูล
        $work = DB::table('work_of_research_groups')
                  ->where('user_id', 2)
                  ->first();

        // ✅ ตรวจสอบว่ามีข้อมูลจริง
        $this->assertNotNull($work);
        $this->assertEquals(10, $work->research_group_id);
        $this->assertEquals(1, $work->role);
    }

    public function test_insert_new_work_of_research_group()
    {
        // ✅ เพิ่มข้อมูลใหม่โดยไม่ใส่ timestamps
        DB::table('work_of_research_groups')->insert([
            'role' => 2,
            'user_id' => 5,
            'research_group_id' => 12
        ]);

        // ✅ ตรวจสอบว่ามีข้อมูลใหม่
        $this->assertDatabaseHas('work_of_research_groups', [
            'user_id' => 5,
            'research_group_id' => 12,
            'role' => 2
        ]);
    }

    public function test_update_work_of_research_group()
    {
        // ✅ เพิ่มข้อมูลตัวอย่าง
        DB::table('work_of_research_groups')->insert([
            'role' => 1,
            'user_id' => 2,
            'research_group_id' => 10
        ]);

        // ✅ อัปเดตข้อมูล
        DB::table('work_of_research_groups')
          ->where('user_id', 2)
          ->update(['role' => 3]);

        // ✅ ตรวจสอบค่าหลังจากอัปเดต
        $this->assertDatabaseHas('work_of_research_groups', [
            'user_id' => 2,
            'role' => 3
        ]);
    }

    public function test_delete_work_of_research_group()
    {
        // ✅ เพิ่มข้อมูลตัวอย่างก่อนลบ
        DB::table('work_of_research_groups')->insert([
            'role' => 1,
            'user_id' => 2,
            'research_group_id' => 10
        ]);

        // ✅ ลบข้อมูล
        DB::table('work_of_research_groups')
          ->where('user_id', 2)
          ->delete();

        // ✅ ตรวจสอบว่าไม่มีข้อมูลนี้แล้ว
        $this->assertDatabaseMissing('work_of_research_groups', [
            'user_id' => 2
        ]);
    }
}