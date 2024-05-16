<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSexeIdToAdminUsersTable extends Migration
{
    public function up()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->unsignedBigInteger('sexe_id')->nullable();

            $table->foreign('sexe_id')->references('id')->on('sexes')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->dropForeign(['sexe_id']);
            $table->dropColumn('sexe_id');
        });
    }
}
