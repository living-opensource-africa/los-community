<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meet_ups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->timestamp('date_time')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('meet_ups', function(Blueprint $table) {
            $table->dropForeign('meet_ups_user_id_foreign');
        });
        Schema::dropIfExists('meet_ups');
        Schema::enableForeignKeyConstraints();
    }
}
