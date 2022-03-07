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
        Schema::create('consoles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->unique();
            $table->timestamps();
        });

        Schema::table('videogames', function (Blueprint $table) {
            $table->unsignedBigInteger('console_id')->nullable()->after('rating_id');

            $table->foreign('console_id')->references('id')->on('consoles')
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
        Schema::table('videogames', function (Blueprint $table){
            $table->dropForeign('videogames_console_id_foreign');
            $table->dropColumn('console_id');
        });
        
        Schema::dropIfExists('consoles');
    }
};
