<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
  protected $table = 'customer';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //Schema::defaultStringLength(191); to app->providers->AppServiceProvider.php
        Schema::create('tests', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('id')->unsigned();
            $table->string('username');
            $table->string('password');
            $table->string('tel',10);
            $table->string('name');
            $table->char('status',1);
            $table->primary(['id', 'username']);


        });
        DB::statement('ALTER TABLE tests MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
