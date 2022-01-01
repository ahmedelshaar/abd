<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('site_title'); // done
            $table->string('site_description'); // done
            $table->string('site_logo'); // done
            $table->string('info_title'); // done
            $table->longText('info_description'); // done
            $table->string('info_image'); // done
            $table->string('info_experience'); // done
            $table->integer('info_client'); // done
            $table->string('info_resume'); // done
            $table->string('service_title'); // done
            $table->longText('service_description'); // done
            $table->string('service_button_text'); // done
            $table->string('service_button_link'); // done
            $table->string('service_background'); // done
            $table->string('contact_description'); // done
            $table->string('contact_map');
            $table->string('contact_image');
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
        Schema::dropIfExists('infos');
    }
}
