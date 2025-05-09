<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Elimina la restricción unique
            $table->string('nombre_completo');
            $table->integer('edad');
            $table->string('peso');
            $table->string('talla');
            $table->string('membresia');
            $table->timestamps();

            // Llave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
