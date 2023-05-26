<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_group', function (Blueprint $table) {
            $table->unsignedBiginteger('group_id')->unsigned();
            $table->unsignedBiginteger('topic_id')->unsigned();
            $table->float('count');

            $table->foreign('topic_id')->references('id')
                ->on('topics')->onDelete('cascade');
            $table->foreign('group_id')->references('id')
                ->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('topic_group');
    }
}
