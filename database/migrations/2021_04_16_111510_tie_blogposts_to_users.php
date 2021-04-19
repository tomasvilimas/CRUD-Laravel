<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TieBlogpostsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogposts', function (Blueprint $table) {
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')
            //         ->references('id')
            //         ->on('users')->onDelete('cascade');

            $admin_uid = DB::table('users')->where('name', '=', 'Admin')->first('id');
            $table->unsignedBigInteger('user_id')->default($admin_uid->id);
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');



        });
    }  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
    {
        Schema::table('blogposts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            

         
        });
    }
}
