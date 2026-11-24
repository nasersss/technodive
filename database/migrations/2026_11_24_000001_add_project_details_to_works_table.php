<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Project facts shown on the works page and the project details page.
     * category_id: the work's category; deleting a category leaves its works uncategorised.
     * client, location, duration: translatable (ar/en) like title and description.
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('description')
                ->constrained('work_categories')->cascadeOnUpdate()->nullOnDelete();
            $table->json('client')->nullable()->after('category_id');
            $table->json('location')->nullable()->after('client');
            $table->json('duration')->nullable()->after('location');
        });
    }

    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            // SQLite never created the foreign key (it can't add one to an existing table)
            if (Schema::getConnection()->getDriverName() !== 'sqlite') {
                $table->dropForeign(['category_id']);
            }
            $table->dropColumn(['category_id', 'client', 'location', 'duration']);
        });
    }
};
