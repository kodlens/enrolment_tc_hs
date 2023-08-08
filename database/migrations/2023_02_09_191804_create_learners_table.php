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
 
            $table->string('psa_cert')->nullable();

            $table->string('lrn')->nullable();
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('extension')->nullable();
            $table->string('sex')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('age')->nullable();
            $table->string('birthplace')->nullable();
            
            $table->string('mother_tongue')->nullable();
            $table->string('is_indigenous')->nullable();
            $table->string('if_yes_indigenous')->nullable();
            $table->string('is_4ps')->nullable();
            $table->string('household_4ps_id_no')->nullable();

            $table->string('current_country')->nullable();
            $table->string('current_province')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_barangay')->nullable();
            $table->string('current_street')->nullable();
            $table->string('current_zipcode')->nullable();

            $table->string('permanent_country')->nullable();
            $table->string('permanent_province')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_barangay')->nullable();
            $table->string('permanent_street')->nullable();
            $table->string('permanent_zipcode')->nullable();

            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();

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

            $table->string('guardian_lname')->nullable();
            $table->string('guardian_fname')->nullable();
            $table->string('guardian_mname')->nullable();
            $table->string('guardian_extension')->nullable();
            $table->string('guardian_contact_no')->nullable();

            $table->unsignedBigInteger('semester_id')->default(0);
            $table->unsignedBigInteger('strand_id')->default(0);
            $table->unsignedBigInteger('track_id')->default(0);
            $table->unsignedBigInteger('section_id')->default(0);
            
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
