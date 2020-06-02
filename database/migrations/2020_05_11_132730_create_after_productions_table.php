<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfterProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_productions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('after_preparation_id');
            $table->decimal('quantity');
            $table->decimal('missing');
            $table->string('user_id');
            $table->string('employee_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('after_productions');
    }
}
