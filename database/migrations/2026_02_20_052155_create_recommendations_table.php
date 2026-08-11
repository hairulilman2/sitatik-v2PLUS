<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('recommendations')) {
            Schema::create('recommendations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('table_name');
                $table->text('table_structure'); // Struktur kolom yang diusulkan operator
                $table->string('category');
                $table->text('description')->nullable(); // Catatan opsional dari operator

                // Dibuat nullable karena Admin yang akan menentukan jadwal saat 'Setuju'
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();

                // Penambahan status 'corrected'
                $table->enum('status', ['pending', 'approved', 'rejected', 'corrected'])->default('pending');
                $table->text('admin_note')->nullable(); // Pesan dari admin (opsional/koreksi)
                $table->timestamps();
                $table->unsignedBigInteger('category_id')->nullable();
            });
        } elseif (!Schema::hasColumn('recommendations', 'category_id')) {
            Schema::table('recommendations', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->nullable()->after('table_structure');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }

};
