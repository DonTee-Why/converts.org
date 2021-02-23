<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('converts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('known_name');
            $table->string('phone_no');
            $table->string('sex');
            $table->string('marital_status');
            $table->string('age');
            $table->string('residential_address')->nullable();
            $table->string('nearest_bustop');
            $table->string('email')->nullable();
            $table->string('office_address')->nullable();
            $table->text('prayer_request')->nullable();
            $table->string('want_to_worship');
            $table->date('date');
            $table->boolean('follow_up_status')->default(false);
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
        //
    }
}
