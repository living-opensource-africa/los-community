<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->foreignId('user_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(1);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('user_type')->references('id')->on('roles');
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_user_type_foreign');
        });
        Schema::enableForeignKeyConstraints();
    }
}
