<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('typevacation_id')->constrained('typevacations')->onDelete('cascade');
            $table->integer('days');
            $table->integer('discount_days')->nullable();
            $table->string('status')->default("pending");
            $table->boolean('visa_request')->default(0);
            $table->boolean('ticket_request')->default(0);
            $table->boolean('paid_in_advance')->default(0);
            $table->decimal('advance_salary', $precision = 8, $scale = 2)->nullable();
            $table->string('date_start');
            $table->string('date_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacations');
    }
}
