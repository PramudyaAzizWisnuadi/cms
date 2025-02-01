<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('logos', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('image');
            $table->string('wa')->nullable()->after('deskripsi');
            $table->string('instagram')->nullable()->after('wa');
            $table->string('tiktok')->nullable()->after('instagram');
            $table->string('facebook')->nullable()->after('tiktok');
            $table->string('maps')->nullable()->after('facebook');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logos', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
            $table->dropColumn('wa');
            $table->dropColumn('instagram');
            $table->dropColumn('tiktok');
            $table->dropColumn('facebook');
            $table->dropColumn('maps');
        });
    }
};
