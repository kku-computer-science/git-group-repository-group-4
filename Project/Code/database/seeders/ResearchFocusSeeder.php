<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchFocus;

class ResearchFocusSeeder extends Seeder
{
    public function run()
    {
        ResearchFocus::create([
            'group_id' => 3, // ตรวจสอบให้แน่ใจว่า group_id นี้มีอยู่ในตาราง research_groups
            'research_topic_th' => 'หัวข้อวิจัยภาษาไทย',
            'research_topic_en' => 'Research Topic in English',
        ]);
    }
}



