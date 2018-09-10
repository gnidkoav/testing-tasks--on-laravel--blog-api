<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateArticlesTable extends Migration
{

    private $table = 'articles';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }

}

