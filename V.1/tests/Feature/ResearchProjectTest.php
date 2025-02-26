<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResearchProjectTest extends TestCase
{
    use DatabaseTransactions; // ✅ ป้องกันข้อมูลหายระหว่างทดสอบ

    public function test_fetch_research_projects_from_database()
    {
        $projects = DB::table('research_projects')->get();
        $this->assertNotEmpty($projects, 'Should fetch research project data');
    }

    public function test_project_data_should_exist()
    {
        $this->assertDatabaseHas('research_projects', [
            'project_name' => 'Statistical Thai – Isarn Dialect Machine Translation System using Parallel Corpus'
        ]);
    }

    public function test_insert_new_research_project()
    {
        DB::table('research_projects')->insert([
            'project_name' => 'AI for Natural Language Processing',
            'project_start' => now(),
            'project_end' => now()->addYear(),
            'project_year' => 2025,
            'budget' => 100000,
            'responsible_department' => 'Department of Computer Science',
            'status' => 1,
            'fund_id' => 2, // ✅ ใช้ค่า `fund_id` ที่มีอยู่จริง
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->assertDatabaseHas('research_projects', [
            'project_name' => 'AI for Natural Language Processing'
        ]);
    }

    public function test_update_research_project_status()
    {
        DB::table('research_projects')
            ->where('project_name', 'Statistical Thai – Isarn Dialect Machine Translation System using Parallel Corpus')
            ->update(['status' => 2]);

        $this->assertDatabaseHas('research_projects', [
            'project_name' => 'Statistical Thai – Isarn Dialect Machine Translation System using Parallel Corpus',
            'status' => 2
        ]);
    }

    public function test_delete_research_project()
    {
        DB::table('research_projects')
            ->where('project_name', 'AI for Natural Language Processing')
            ->delete();

        $this->assertDatabaseMissing('research_projects', [
            'project_name' => 'AI for Natural Language Processing'
        ]);
    }
}