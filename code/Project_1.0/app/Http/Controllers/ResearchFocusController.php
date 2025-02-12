<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchFocus;
use App\Models\ResearchGroup;

class ResearchFocusController extends Controller
{
    // Show form for creating a new research focus
    public function create()
    {
        $groups = ResearchGroup::all(); // ดึงข้อมูลกลุ่มวิจัยทั้งหมด
        return view('research-focus.create', compact('groups'));
    }

    // Store a newly created research focus in storage
   /* public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required|exists:research_groups,id',
            'research_topic_th' => 'required|string',
            'research_topic_en' => 'required|string',
        ]);

        // Create new research focus
        ResearchFocus::create([
            'group_id' => $request->group_id,
            'research_topic_th' => $request->research_topic_th,
            'research_topic_en' => $request->research_topic_en,
        ]);

        return redirect()->route('research-focus.index')->with('success', 'Research Focus created successfully!');
    }*/

    public function store(Request $request)
    {
    $request->validate([
        'group_id' => 'required|exists:research_groups,id',
        'research_focus' => 'required|array',
        'research_focus.*.research_topic_th' => 'required|string',
        'research_focus.*.research_topic_en' => 'required|string',
    ]);

    // บันทึกหลายหัวข้อวิจัย
    foreach ($request->research_focus as $focus) {
        ResearchFocus::create([
            'group_id' => $request->group_id,
            'research_topic_th' => $focus['research_topic_th'],
            'research_topic_en' => $focus['research_topic_en'],
        ]);
    }

        return redirect()->route('researchGroups.index')->with('success', 'Research Focus created successfully!');
    }


    // Show the form for editing the specified research focus
    public function edit(ResearchFocus $researchFocus)
    {
        $groups = ResearchGroup::all(); // ดึงข้อมูลกลุ่มวิจัยทั้งหมด
        return view('research-focus.edit', compact('researchFocus', 'groups'));
    }

    // Update the specified research focus in storage
    /*public function update(Request $request, ResearchFocus $researchFocus)
    {
        $request->validate([
            'group_id' => 'required|exists:research_groups,id',
            'research_topic_th' => 'required|string',
            'research_topic_en' => 'required|string',
        ]);

        // Update the research focus
        $researchFocus->update([
            'group_id' => $request->group_id,
            'research_topic_th' => $request->research_topic_th,
            'research_topic_en' => $request->research_topic_en,
        ]);

        return redirect()->route('research-focus.show', $researchFocus->id)->with('success', 'Research Focus updated successfully!');
    }*/

    public function update(Request $request, $id)
    {
    $researchGroup = ResearchGroup::findOrFail($id);

    // อัพเดทข้อมูลกลุ่มวิจัย
    $researchGroup->update([
        'group_name_th' => $request->group_name_th,
        'group_name_en' => $request->group_name_en,
        // อัพเดทข้อมูลอื่น ๆ ...
    ]);

    // เพิ่มหัวข้อวิจัยใหม่
    if ($request->has('moreFields')) {
        foreach ($request->moreFields as $focus) {
            $researchGroup->researchFocus()->create([
                'research_topic' => $focus['research_topic']
            ]);
        }
    }

        return redirect()->route('researchGroups.index');
    }


    // Display the specified research focus
    public function show(ResearchFocus $researchFocus)
    {
        return view('research-focus.show', compact('researchFocus'));
    }
}
