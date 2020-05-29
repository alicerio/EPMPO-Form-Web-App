<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agency_id');

            $table->unsignedBigInteger('parent_id')->nullable(); // use this field to reference a previous project / revision; if it's a new project then it won't have a parent id

            $table->tinyInteger('status')->default(0);

            // only admins can edit mpo_id and csj_cn
            $table->string('mpo_id')->nullable();
            $table->string('csj_cn')->nullable();

            $table->string('author')->nullable();

            $table->string('name');
            $table->string('description')->nullable();
            $table->string('limit_from')->nullable();
            $table->string('limit_to')->nullable();
            $table->string('relationship_description')->nullable();
            $table->string('need_purpose')->nullable();
            $table->string('agency_comments')->nullable();

            $table->boolean('hwrw_funds_request')->nullable();
            $table->boolean('transit_funds_request')->nullable();
            $table->Integer('fiscal_year')->nullable();
            $table->string('hwrw_name')->nullable();
            $table->Integer('network_year')->nullable();
            $table->tinyInteger('type')->nullable();

            $table->boolean('on_state')->nullable();
            $table->boolean('off_state')->nullable();
            $table->boolean('capacity_project')->nullable();

            $table->tinyInteger('classification')->nullable();
            $table->tinyInteger('existing_lanes')->nullable();
            $table->tinyInteger('district')->nullable();
            $table->tinyInteger('projected_lanes')->nullable();
            $table->string('miles')->nullable();
            $table->tinyInteger('county')->nullable();
            $table->tinyInteger('incorporated_city')->nullable();
            $table->string('sponsor_entity')->nullable();

            $table->boolean('psp_1')->nullable();
            $table->boolean('psp_2')->nullable();
            $table->boolean('psp_3')->nullable();
            $table->boolean('psp_4')->nullable();
            $table->boolean('psp_5')->nullable();
            $table->boolean('psp_6')->nullable();

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

            $table->boolean('strategy_1')->nullable();
            $table->boolean('strategy_2')->nullable();
            $table->boolean('strategy_3')->nullable();
            $table->boolean('strategy_4')->nullable();
            $table->boolean('strategy_5')->nullable();
            $table->boolean('strategy_6')->nullable();

            $table->string('description_strategy_1')->nullable();
            $table->string('description_strategy_2')->nullable();
            $table->string('description_strategy_3')->nullable();
            $table->string('description_strategy_4')->nullable();
            $table->string('description_strategy_5')->nullable();
            $table->string('description_strategy_6')->nullable();

            $table->string('voc')->nullable();
            $table->string('c0')->nullable();
            $table->string('nox')->nullable();
            $table->string('pm10')->nullable();
            $table->string('prepared_by')->nullable();

            $table->string('section_5309')->nullable();
            $table->string('appointment_year')->nullable();
            $table->string('tdc_award_amount')->nullable();
            $table->string('tdw_award_date')->nullable();
            $table->string('tdc_amount_requested')->nullable();

            $table->boolean('type_capital')->nullable();
            $table->boolean('type_operating')->nullable();
            $table->boolean('type_planning')->nullable();
            $table->boolean('type_administration')->nullable();
            $table->tinyInteger('block_system')->nullable();

            // Last Page

            $table->date('schematic_start_date')->nullable();
            $table->date('schematic_end_date')->nullable();
            $table->tinyInteger('schematic_progress')->nullable();
            $table->tinyInteger('schematic_agency')->nullable();
            $table->string('schematic_comments')->nullable();

            $table->date('envdoctype_start_date')->nullable();
            $table->date('envdoctype_end_date')->nullable();
            $table->tinyInteger('envdoctype_progress')->nullable();
            $table->tinyInteger('envdoctype_agency')->nullable();
            $table->string('envdoctype_comments')->nullable();

            $table->date('envdoc_start_date')->nullable();
            $table->date('envdoc_end_date')->nullable();
            $table->tinyInteger('envdoc_progress')->nullable();
            $table->tinyInteger('envdoc_agency')->nullable();
            $table->string('envdoc_comments')->nullable();

            $table->date('pse_start_date')->nullable();
            $table->date('pse_end_date')->nullable();
            $table->tinyInteger('pse_progress')->nullable();
            $table->tinyInteger('pse_agency')->nullable();
            $table->string('pse_comments')->nullable();

            $table->date('rowmap_start_date')->nullable();
            $table->date('rowmap_end_date')->nullable();
            $table->tinyInteger('rowmap_progress')->nullable();
            $table->tinyInteger('rowmap_agency')->nullable();
            $table->string('rowmap_comments')->nullable();

            $table->date('rowacq_start_date')->nullable();
            $table->date('rowacq_end_date')->nullable();
            $table->tinyInteger('rowacq_progress')->nullable();
            $table->tinyInteger('rowacq_agency')->nullable();
            $table->string('rowacq_comments')->nullable();
            
            $table->date('utilities_start_date')->nullable();
            $table->date('utilities_end_date')->nullable();
            $table->tinyInteger('utilities_progress')->nullable();
            $table->tinyInteger('utilities_agency')->nullable();
            $table->string('utilities_comments')->nullable();
            
            $table->date('pubinv_start_date')->nullable();
            $table->date('pubinv_end_date')->nullable();
            $table->tinyInteger('pubinv_progress')->nullable();
            $table->tinyInteger('pubinv_agency')->nullable();
            $table->string('pubinv_comments')->nullable();
            
            $table->date('distrev_start_date')->nullable();
            $table->date('distrev_end_date')->nullable();
            $table->tinyInteger('distrev_progress')->nullable();
            $table->tinyInteger('distrev_agency')->nullable();
            $table->string('distrev_comments')->nullable();

            $table->date('agree_start_date')->nullable();
            $table->date('agree_end_date')->nullable();
            $table->tinyInteger('agree_progress')->nullable();
            $table->tinyInteger('agree_agency')->nullable();
            $table->string('agree_comments')->nullable();

            $table->date('procpro_start_date')->nullable();
            $table->date('procpro_end_date')->nullable();
            $table->tinyInteger('procpro_progress')->nullable();
            $table->tinyInteger('procpro_agency')->nullable();
            $table->string('procpro_comments')->nullable();

            $table->date('letdate_start_date')->nullable();
            $table->date('letdate_end_date')->nullable();
            $table->tinyInteger('letdate_progress')->nullable();
            $table->tinyInteger('letdate_agency')->nullable();
            $table->string('letdate_comments')->nullable();

            $table->date('consper_end_date_start_date')->nullable();
            $table->date('consper_end_date_end_date')->nullable();
            $table->tinyInteger('consper_end_date_progress')->nullable();
            $table->tinyInteger('consper_end_date_agency')->nullable();
            $table->string('consper_end_date_comments')->nullable();

            $table->date('peperf_start_date')->nullable();
            $table->date('peperf_end_date')->nullable();
            $table->tinyInteger('peperf_progress')->nullable();
            $table->tinyInteger('peperf_agency')->nullable();
            $table->string('peperf_comments')->nullable();

            $table->date('fta_trans_start_date')->nullable();
            $table->date('fta_trans_end_date')->nullable();
            $table->tinyInteger('fta_trans_progress')->nullable();
            $table->tinyInteger('fta_trans_agency')->nullable();
            $table->string('fta_trans_comments')->nullable();

            $table->date('active_fta_start_date')->nullable();
            $table->date('active_fta_end_date')->nullable();
            $table->tinyInteger('active_fta_progress')->nullable();
            $table->tinyInteger('active_fta_agency')->nullable();
            $table->string('active_fta_comments')->nullable();

            $table->date('bus_start_date')->nullable();
            $table->date('bus_end_date')->nullable();
            $table->tinyInteger('bus_progress')->nullable();
            $table->tinyInteger('bus_agency')->nullable();
            $table->string('bus_comments')->nullable();

            $table->date('delivery_start_date')->nullable();
            $table->date('delivery_end_date')->nullable();
            $table->tinyInteger('delivery_progress')->nullable();
            $table->tinyInteger('delivery_agency')->nullable();
            $table->string('delivery_comments')->nullable();

            $table->date('other_start_date')->nullable();
            $table->date('other_end_date')->nullable();
            $table->tinyInteger('other_progress')->nullable();
            $table->tinyInteger('other_agency')->nullable();
            $table->string('other_comments')->nullable();

            $table->boolean('reviewed_yes')->nullable();
            $table->boolean('reviewed_no')->nullable();
            $table->boolean('reviewed_na')->nullable();
            $table->date('date_reviewed')->nullable();

            // Project Phases

            $table->boolean('fta_transfer')->nullable();
            $table->boolean('c')->nullable();
            $table->boolean('nonc')->nullable();
            $table->boolean('pe')->nullable();
            $table->boolean('env')->nullable();
            $table->boolean('eng')->nullable();
            $table->boolean('r')->nullable();
            $table->boolean('acq')->nullable();
            $table->boolean('utl')->nullable();

            $table->Integer('subtotal_amount')->nullable();
            $table->Integer('non_construction_amount')->nullable();
            $table->Integer('construction_amount')->nullable();
            $table->Integer('ce_amount')->nullable();
            $table->Integer('contingencies_amount')->nullable();
            $table->Integer('change_order_amount')->nullable();
            $table->Integer('PE_amount')->nullable();
            $table->Integer('indirects_amount')->nullable();
            $table->Integer('ROW_amount')->nullable();
            $table->Integer('transfer_amount')->nullable();
            $table->Integer('total_amount')->nullable();

            // Page 4

            $table->tinyInteger('costs_1')->nullable();
            $table->tinyInteger('costs_2')->nullable();
            $table->tinyInteger('costs_3')->nullable();
            $table->tinyInteger('costs_4')->nullable();

            $table->boolean('mpo_funds')->nullable();
            $table->Integer('yoe_cost')->nullable();

            $table->string('funding_category')->nullable();
            $table->Integer('funding_federal')->nullable();
            $table->Integer('funding_state')->nullable();
            $table->Integer('funding_local')->nullable();
            $table->Integer('funding_local_beyond')->nullable();
            $table->Integer('funding_total')->nullable();

            $table->Integer('funding_federal_result')->nullable();
            $table->Integer('funding_state_result')->nullable();
            $table->Integer('funding_local_result')->nullable();
            $table->Integer('funding_local_beyond_result')->nullable();
            $table->Integer('funding_total_result')->nullable();

            $table->string('local_pm_name')->nullable();
            $table->string('local_pm_phone')->nullable();
            $table->string('local_pm_email')->nullable();
            $table->string('local_pm_agency')->nullable();
            $table->string('local_pm_title')->nullable();

            $table->string('state_pm_name')->nullable();
            $table->string('state_pm_phone')->nullable();
            $table->string('state_pm_email')->nullable();
            $table->string('state_pm_agency')->nullable();
            $table->string('state_pm_title')->nullable();

            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->string('sponsor_email')->nullable();
            $table->string('sponsor_agency')->nullable();
            $table->string('sponsor_title')->nullable();
            $table->string('signature')->nullable();
            $table->string('comments_1')->nullable();
            $table->string('comments_2')->nullable();
            $table->string('comments_3')->nullable();
            $table->string('comments_4')->nullable();
            $table->string('comments_5')->nullable();


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}