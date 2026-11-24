<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Project facts shown on the works page and the project details page.
     * category: salvage | welding | survey (also shown as the "service type").
     * client, location, duration: translatable (ar/en) like title and description.
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->string('category', 20)->nullable()->after('description');
            $table->json('client')->nullable()->after('category');
            $table->json('location')->nullable()->after('client');
            $table->json('duration')->nullable()->after('location');
        });
    }

    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn(['category', 'client', 'location', 'duration']);
        });
    }
};
