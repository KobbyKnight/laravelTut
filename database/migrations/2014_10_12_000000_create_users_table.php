<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {            
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password'); 
                $table->string('first_name')->nullable();
                $table->string('middle_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('city')->nullable();
                $table->integer('role_id')->unsigned()->default(1);
                
                $table->rememberToken();
                $table->timestamps();
            }); 
        }
              
        // Schema::table('users', function(Blueprint $table){
      
        //     // $table->foreign('role_id')->references('id')->on('roles');
            
        //  });

        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
