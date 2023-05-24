<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics_students', function (Blueprint $table) {
            $table->unsignedBiginteger('student_id')->unsigned();
            $table->unsignedBiginteger('topic_id')->unsigned();
            $table->float('score');

            $table->foreign('topic_id')->references('id')
                ->on('topics')->onDelete('cascade');
            $table->foreign('student_id')->references('id')
                ->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('topic_student');
    }
}
