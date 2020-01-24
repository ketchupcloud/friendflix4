<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id'); /* incrementa em 1 */
			$table->string('nome');
			$table->longText('sinopse');
			$table->unsignedBigInteger('user_id');
			$table->timestamps(); /* guarda o momento de criacao/atualizacao */
        });
		Schema::table('series', function(Blueprint $table) {
		$table->foreign('user_id')->references('id')->on('users')->
		OnDelete('cascade');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
