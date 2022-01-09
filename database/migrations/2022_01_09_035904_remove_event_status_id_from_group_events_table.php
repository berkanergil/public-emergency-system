<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEventStatusIdFromGroupEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_events', function (Blueprint $table) {
            $table->dropColumn('event_status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_events', function (Blueprint $table) {
            $table->bigInteger('event_status_id')->unsigned()->nullable();
        });
    }
}
