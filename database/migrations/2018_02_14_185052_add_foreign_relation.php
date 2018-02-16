<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
        Schema::table('requests', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('request_type_id')->references('id')->on('request_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_role_id_foreign');
        });
        Schema::table('requests', function(Blueprint $table){
            $table->dropForeign('requests_request_type_id_foreign');
            $table->dropForeign('requests_user_id_foreign');
        });
    }
}
