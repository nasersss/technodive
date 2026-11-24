<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Work categories (أقسام الأعمال), managed from the dashboard. They filter the
     * works page and show as the project's service type. name is translatable (ar/en).
     */
    public function up()
    {
        Schema::create('work_categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->smallInteger('is_active')->default(1);
            $table->timestamps();
        });

        // The categories the site launched with
        $now = now();
        DB::table('work_categories')->insert(array_map(fn ($name) => [
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'is_active' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ], [
            ['ar' => 'إنقاذ سفن', 'en' => 'Ship salvage'],
            ['ar' => 'لحام وقص', 'en' => 'Welding & cutting'],
            ['ar' => 'مسوحات', 'en' => 'Surveys'],
        ]));
    }

    public function down()
    {
        Schema::dropIfExists('work_categories');
    }
};
