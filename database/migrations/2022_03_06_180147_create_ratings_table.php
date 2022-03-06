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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->unique();
            $table->timestamps();
        });

        Schema::table('videogames', function (Blueprint $table) {
            $table->unsignedBigInteger('rating_id')->nullable()->after('title');
            
            $table->foreign('rating_id')->references('id')->on('ratings')
            ->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videogames', function (Blueprint $table) {
            $table->dropForeign('videogames_rating_id_foreign');
            $table->dropColumn('rating_id');
        });
        Schema::dropIfExists('ratings');
    }
};
