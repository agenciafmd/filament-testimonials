<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', static function (Blueprint $table): void {
            $table->integer('sort')
                ->nullable()
                ->after('star');
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', static function (Blueprint $table): void {
            $table->dropColumn('sort');
        });
    }
};
