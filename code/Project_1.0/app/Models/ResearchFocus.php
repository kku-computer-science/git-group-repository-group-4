<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchFocus extends Model
{
    use HasFactory;

    protected $table = 'research_focuses';

    protected $fillable = [
        'group_id',
        'research_topic_en'  // เพิ่ม field นี้
    ];
    //'research_topic_th',  // เพิ่ม field นี้
    

    // เชื่อมกับ Research Group
    public function researchGroup()
    {
        return $this->belongsTo(ResearchGroup::class, 'group_id');
    }
    
}
