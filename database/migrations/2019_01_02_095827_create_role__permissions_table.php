<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role__permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("table_name");
            $table->unsignedInteger("role_id")->index();
            $table->unsignedInteger("permission_id")->index();
            $table->foreign("permission_id")->references("id")->on("permissions");
            $table->foreign("role_id")->references("id")->on("roles");
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
        Schema::dropIfExists('role__permissions');
    }
}
