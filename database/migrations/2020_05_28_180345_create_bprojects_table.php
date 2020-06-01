<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bprojects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agency_id');

            $table->unsignedBigInteger('parent_id')->nullable(); // use this field to reference a previous project / revision; if it's a new project then it won't have a parent id

            $table->tinyInteger('status')->default(0);

            $table->string('mpo_id')->nullable();
            $table->string('csj_cn')->nullable();

            $table->string('author')->nullable();

            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('limit_from')->nullable();
            $table->string('limit_to')->nullable();
            $table->string('need_purpose')->nullable();
            $table->string('agency_comments')->nullable();

            $table->boolean('transit_funds_request')->nullable();
            $table->Integer('fiscal_year')->nullable();
            $table->Integer('network_year')->nullable();

            $table->boolean('psp_1')->nullable();
            $table->boolean('psp_2')->nullable();
            $table->boolean('psp_3')->nullable();
            $table->boolean('psp_4')->nullable();
            $table->boolean('psp_5')->nullable();

            $table->boolean('goal_1')->nullable();
            $table->boolean('goal_2')->nullable();
            $table->boolean('goal_3')->nullable();
            $table->boolean('goal_4')->nullable();
            $table->boolean('goal_5')->nullable();
            $table->boolean('goal_6')->nullable();

            $table->string('description_goal_1')->nullable();
            $table->string('description_goal_2')->nullable();
            $table->string('description_goal_3')->nullable();
            $table->string('description_goal_4')->nullable();
            $table->string('description_goal_5')->nullable();
            $table->string('description_goal_6')->nullable();

            $table->tinyInteger('strategy_1')->nullable();
            $table->tinyInteger('strategy_2')->nullable();
            $table->tinyInteger('strategy_3')->nullable();
            $table->tinyInteger('strategy_4')->nullable();
            $table->tinyInteger('strategy_5')->nullable();
            $table->tinyInteger('strategy_6')->nullable();

            $table->string('description_strategy_1')->nullable();
            $table->string('description_strategy_2')->nullable();
            $table->string('description_strategy_3')->nullable();
            $table->string('description_strategy_4')->nullable();
            $table->string('description_strategy_7')->nullable();
            $table->string('description_strategy_8')->nullable();
            $table->string('description_strategy_9')->nullable();
            $table->string('description_strategy_10')->nullable();

            $table->tinyInteger('block_system')->nullable();
            $table->tinyInteger('reviewed_dates')->nullable();

            $table->boolean('capital')->nullable();
            $table->boolean('operations')->nullable();
            $table->boolean('c')->nullable();
            $table->boolean('nonc')->nullable();
            $table->boolean('pe')->nullable();
            $table->boolean('env')->nullable();
            $table->boolean('eng')->nullable();
            $table->boolean('r')->nullable();
            $table->boolean('acq')->nullable();
            $table->boolean('utl')->nullable();

            $table->Integer('appointment_year')->nullable();
            $table->Integer('tdc_award_amount')->nullable();
            $table->date('tdw_award_date')->nullable();
            $table->Integer('tdc_amount_requested')->nullable();
            $table->boolean('type_capital')->nullable();
            $table->boolean('type_operating')->nullable();
            $table->boolean('type_planning')->nullable();

            $table->boolean('mpo_funds')->nullable();
            $table->Integer('yoe_cost_vehicles')->nullable();
            $table->string('funding_category_vehicles')->nullable();
            $table->string('funding_federal_vehicles')->nullable();
            $table->string('funding_local_vehicles')->nullable();
            $table->string('funding_local_beyond_vehicles')->nullable();
            $table->string('funding_total_vehicles')->nullable();
            $table->string('funding_tdc_vehicles')->nullable();

            $table->Integer('funding_federal_vehicles_total')->nullable();
            $table->Integer('funding_local_vehicles_total')->nullable();
            $table->Integer('funding_local_beyond_vehicles_total')->nullable();
            $table->Integer('funding_total_vehicles_total')->nullable();
            $table->Integer('funding_tdc_vehicles_total')->nullable();

            $table->Integer('yoe_cost_bus')->nullable();
            $table->string('funding_category_bus')->nullable();
            $table->string('funding_federal_bus')->nullable();
            $table->string('funding_local_bus')->nullable();
            $table->string('funding_local_beyond_bus')->nullable();
            $table->string('funding_total_bus')->nullable();
            $table->string('funding_tdc_bus')->nullable();

            $table->Integer('funding_federal_bus_total')->nullable();
            $table->Integer('funding_local_bus_total')->nullable();
            $table->Integer('funding_local_beyond_bus_total')->nullable();
            $table->Integer('funding_total_bus_total')->nullable();
            $table->Integer('funding_tdc_bus_total')->nullable();

            $table->Integer('yoe_cost_operations')->nullable();
            $table->string('funding_category_operations')->nullable();
            $table->string('funding_federal_operations')->nullable();
            $table->string('funding_local_operations')->nullable();
            $table->string('funding_local_beyond_operations')->nullable();
            $table->string('funding_total_operations')->nullable();

            $table->Integer('funding_federal_operations_total')->nullable();
            $table->Integer('funding_local_operations_total')->nullable();
            $table->Integer('funding_local_beyond_operations_total')->nullable();
            $table->Integer('funding_total_operations_total')->nullable();

            $table->string('sponsor')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_agency')->nullable();
            $table->string('contact_title')->nullable();

            $table->string('signature')->nullable();

            $table->string('comments_1')->nullable();
            $table->string('comments_2')->nullable();
            $table->string('comments_3')->nullable();
            $table->string('comments_4')->nullable();
            $table->string('comments_5')->nullable();

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
        Schema::dropIfExists('bprojects');
    }
}
