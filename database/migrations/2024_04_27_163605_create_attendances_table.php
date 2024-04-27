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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('start_time', precision:0);
            $table->time('finish_time', precision:0);
            $table->float('break_time');
            $table->float('working_hours');
            $table->unsignedBigInteger('employee_type_id')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('employee_type_id')->references('id')->on('employee_types')->onDelete('set null');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
