<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePromosiTable extends Migration
{
    public function up()
    {
        Schema::table('promosi_image', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('promosi_image', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
        });
    }
}

