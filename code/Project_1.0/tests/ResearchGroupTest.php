<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\ResearchGroup;
use Illuminate\Support\Facades\DB;

class ResearchGroupTest extends TestCase
{
    /** @test */
    public function test_fetch_research_groups_from_database()
    {
        // ✅ Query ข้อมูลจากฐานข้อมูล
        $groups = ResearchGroup::all();

        // ✅ ตรวจสอบว่ามีข้อมูลอยู่
        $this->assertNotEmpty($groups, 'ฐานข้อมูลไม่มีข้อมูล Research Group');

        // ✅ ตรวจสอบว่ามีข้อมูลที่ถูกต้อง
        $existingGroup = ResearchGroup::where('group_name_en', 'Advanced GIS Technology (AGT)')->first();
        $this->assertNotNull($existingGroup, 'ไม่มีข้อมูล Advanced GIS Technology (AGT) ในฐานข้อมูล');

        $this->assertEquals('Advanced GIS Technology (AGT)', $existingGroup->group_name_en);
    }

    /** @test */
    public function test_insert_new_research_group()
    {
        // ✅ เพิ่มข้อมูลใหม่
        $group = ResearchGroup::create([
            'group_name_th' => 'ห้องปฏิบัติการคอมพิวเตอร์',
            'group_name_en' => 'Computer Lab',
            'group_detail_th' => 'เพื่อการเรียนรู้และวิจัยเกี่ยวกับเทคโนโลยีสารสนเทศ',
            'group_detail_en' => 'For learning and research in IT',
            'group_desc_th' => 'เน้นการศึกษาและพัฒนา IT',
            'group_desc_en' => 'Focus on studying and developing IT',
            'group_image' => 'computer_lab.jpeg'
        ]);

        // ✅ ตรวจสอบว่าข้อมูลถูกเพิ่มลงฐานข้อมูล
        $this->assertDatabaseHas('research_groups', [
            'group_name_en' => 'Computer Lab'
        ]);
    }

    /** @test */
    public function test_update_research_group()
    {
        // ✅ อัปเดตข้อมูลของกลุ่มวิจัยที่มีอยู่
        $group = ResearchGroup::where('group_name_en', 'Advanced GIS Technology (AGT)')->first();
        $this->assertNotNull($group, 'ไม่พบข้อมูล Research Group ที่ต้องการอัปเดต');

        $group->update(['group_desc_en' => 'Updated GIS research description']);

        // ✅ ตรวจสอบว่าข้อมูลถูกอัปเดตจริง
        $this->assertDatabaseHas('research_groups', [
            'group_name_en' => 'Advanced GIS Technology (AGT)',
            'group_desc_en' => 'Updated GIS research description'
        ]);
    }

    /** @test */
    public function test_delete_research_group()
    {
        // ✅ ลบข้อมูลของ Research Group
        $group = ResearchGroup::where('group_name_en', 'Computer Lab')->first();
        $this->assertNotNull($group, 'ไม่พบข้อมูล Research Group ที่ต้องการลบ');

        $group->delete();

        // ✅ ตรวจสอบว่าข้อมูลถูกลบจากฐานข้อมูล
        $this->assertDatabaseMissing('research_groups', [
            'group_name_en' => 'Computer Lab'
        ]);
    }
}