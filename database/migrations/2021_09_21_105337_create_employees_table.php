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
            $table->string('name', 255);
            $table->string('last_name', 255);
            $table->unsignedBigInteger('cui');
            $table->string('address', 255);
            $table->date('date_birth');
            $table->integer('phone_number');
            $table->integer('home_phone')->nullable();
            $table->string('nit', 255);
            $table->enum('payment', ['nomina', 'cheque']);
            $table->string('bank_account', 200)->nullable();
            $table->string('bank', 200)->nullable();
            $table->unsignedInteger('igss')->nullable();
            $table->decimal('percentage_igss', 7,2)->nullable();
            $table->enum('gender', ['masculino', 'femenino']);
            $table->enum('marital_status', ['casado', 'soltero']);
            $table->boolean('retirement')->default(false);
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('job_titles')->onDelete('cascade');
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
