<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpUserZalo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('vp_user_zalo', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('user_id')->length(11)->unsigned();
        //     $table->foreign('user_id')
        //           ->references('id')
        //           ->on('vp_users');
        //     $table->integer('appid')->length(11)->unsigned();
        //     $table->foreign('appid')
        //           ->references('id')
        //           ->on('vp_zalo_apps');
        //     $table->string('zalo_id');
        //     $table->text('access_token');
        //     $table->text('access_token_date');
        //     $table->text('expires_in');
        //     $table->integer('status');
        //     $table->integer('page');
        //     $table->text('emei');
        //     $table->text('cookie');
        //     $table->text('serectkey');
        //     $table->text('url_chat');
        //     $table->text('url_ctl');
        //     $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_user_zaloapp');
    }
}
