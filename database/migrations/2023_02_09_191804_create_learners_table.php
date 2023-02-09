<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learners', function (Blueprint $table) {
            $table->id('learner_id');
 
            $table->string('lrn')->nullable();
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('extension')->nullable();

            $table->string('sex')->nullable();

            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('is_indigenous')->nullable();
            $table->string('specify_indigenous')->nullable();

            $table->string('is_4ps')->nullable();
            $table->string('household_4ps_no')->nullable();

            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
 
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('street')->nullable();
            $table->string('zipcode')->nullable();

            //father
            $table->string('father_lname')->nullable();
            $table->string('father_fname')->nullable();
            $table->string('father_mname')->nullable();
            $table->string('father_extension')->nullable();
            $table->string('father_contact_no')->nullable();

            //mother
            $table->string('mother_maiden_lname')->nullable();
            $table->string('mother_maiden_fname')->nullable();
            $table->string('mother_maiden_mname')->nullable();
            $table->string('mother_maiden_extension')->nullable();
            $table->string('mother_maiden_contact_no')->nullable();

            
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
        Schema::dropIfExists('learners');
    }
}
