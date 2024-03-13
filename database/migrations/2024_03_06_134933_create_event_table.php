<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('lieu');
            $table->time('durai');
            $table->decimal('prix', 8, 2);
            $table->string('image');
            $table->boolean('isvalide');
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
        Schema::table('events', function (Blueprint $table) {
            // Remove the foreign key constraint temporarily
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('events');

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('lieu');
            $table->time('durai');
            $table->decimal('prix', 8, 2);
            $table->string('image');
            $table->boolean('isvalide');
            $table->timestamps();
        });
    }
};
