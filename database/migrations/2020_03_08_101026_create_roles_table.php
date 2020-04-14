<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name');
            $table->timestamps();
        });

        // Seed the database with user roles
        \App\Role::create([
            'name' => 'admin'
        ]);

        \App\Role::create([
            'name' => 'member'
        ]);

        \App\Role::create([
            'name' => 'student'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
