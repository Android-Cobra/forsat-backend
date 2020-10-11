<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opportunity_id');// in opportunity table defined as  $table->id();
            $table->mediumText('benefits');
            $table->mediumText('application_process');
            $table->mediumText('further_queries') -> nullable();
            $table->mediumText('eligibilities');
            $table->timestamp('start_date') -> nullable();
            $table->timestamp('end_date') -> nullable();
            $table->string('official_link') -> nullable();
            $table->json('eligible_regions') -> nullable();
            $table->timestamps();
        });

        Schema::table('opportunity_details', function (Blueprint $table) {
            $table -> foreign('opportunity_id')
                -> references('id')
                -> on('opportunities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunity_details');
    }
}
