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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('expiring_date')->nullable();
            $table->unsignedSmallInteger('vacancy_status');
            $table->unsignedSmallInteger('working_day');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('employee_type_id')->nullable();
            $table->decimal('amount', 9, 2);
            $table->string('amount_per');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
            $table->foreign('employee_type_id')->references('id')->on('employee_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
