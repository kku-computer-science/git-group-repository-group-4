<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name_th', 'group_name_en', 'group_detail_th', 'group_detail_en', 'group_desc_th', 'group_desc_en', 'group_image'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class,'work_of_research_groups')->withPivot('role');
        // OR return $this->hasOne('App\Phone');
    }
    public function product(){
        return $this->hasOne(Product::class,'group_id');
    }

    //Add function reference to researchFocus
    public function researchFocus()
    {
        return $this->hasMany(ResearchFocus::class, 'group_id');
    }
        // 📌 ดึง Contact ตาม Research Group
    public function contactPersons()
    {
        return $this->belongsToMany(User::class, 'work_of_research_groups', 'research_group_id', 'user_id')
                    ->wherePivot('role', 1); // ดึงเฉพาะคนที่เป็น Contact Person (role = 1)
    }

    public function members()
    {   
    return $this->belongsToMany(User::class, 'work_of_research_groups');
    }
}
