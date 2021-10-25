<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->date('date')->nullable();
            $table->set('marital', ['married', 'single']);
            $table->set('sex', ['male', 'female']);
            $table->bigInteger('identification_number');
            $table->date('id_issuance_date')->nullable();
            $table->date('id_expiration_date')->nullable();
            $table->bigInteger('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('Place_of_passport')->nullable();
            $table->string('place_of_issuance_of_the_passport')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('job_number');
            $table->string('job_title');
            $table->string('type_of_contract')->nullable();
            $table->bigInteger('testing_period')->nullable();
            $table->string('duration_of_contract')->nullable();
            $table->date('contract_start_date');
            $table->date('contract_end_date')->nullable();
            $table->integer('vacations_balance');
            $table->decimal('basic_salary', $precision = 8, $scale = 2);
            $table->decimal('compensation', $precision = 8, $scale = 2)->nullable();
            $table->integer('notice_period')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
