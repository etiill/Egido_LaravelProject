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
    Schema::table('courses', function (Blueprint $table) {
        if (!Schema::hasColumn('courses', 'course_name')) {
            $table->string('course_name')->after('id');
        }

        if (!Schema::hasColumn('courses', 'description')) {
            $table->string('description')->nullable()->after('course_name');
        }

        if (!Schema::hasColumn('courses', 'status')) {
            $table->enum('status', ['active', 'inactive'])->default('active')->after('description');
        }
    });
}

public function down(): void
{
    Schema::table('courses', function (Blueprint $table) {
        if (Schema::hasColumn('courses', 'course_name')) {
            $table->dropColumn('course_name');
        }

        if (Schema::hasColumn('courses', 'description')) {
            $table->dropColumn('description');
        }

        if (Schema::hasColumn('courses', 'status')) {
            $table->dropColumn('status');
        }
    });
}
};