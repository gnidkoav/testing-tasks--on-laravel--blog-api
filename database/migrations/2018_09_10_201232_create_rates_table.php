<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateRatesTable extends Migration
{

    private $table = 'rates';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('author_id');
            $table->enum('rate', ['1', '2', '3', '4', '5']);
            $table->timestamps();
        });
        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }

}

