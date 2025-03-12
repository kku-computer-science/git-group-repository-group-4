<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchFocusTable  extends Migration 
{
    public function up()
    {
        Schema::create('research_focuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('research_groups')->onDelete('cascade');
            $table->string('research_topic_th');
            $table->string('research_topic_en');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('research_focuses');
    }
}
