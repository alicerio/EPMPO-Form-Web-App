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
            $table->text('project_type');

            // only admins can edit mpo_id and csj_cn
            $table->string('mpo_id')->nullable();
            $table->string('csj_cn')->nullable();

            $table->string('author')->nullable();

            $table->string('name');
            $table->text('description')->nullable();
            $table->text('limit_from')->nullable();
            $table->text('limit_to')->nullable();
            $table->text('relationship_description')->nullable();
            $table->text('need_purpose')->nullable();
            $table->text('agency_comments')->nullable();

            $table->boolean('hwrw_funds_request')->nullable();
            $table->boolean('transit_funds_request')->nullable();
            $table->Integer('fiscal_year')->nullable();
            $table->text('hwrw_name')->nullable();
            $table->Integer('network_year')->nullable();
            $table->tinyInteger('type')->nullable();

            $table->boolean('on_state')->nullable();
            $table->boolean('off_state')->nullable();
            $table->boolean('capacity_project')->nullable();

            $table->tinyInteger('classification')->nullable();
            $table->tinyInteger('existing_lanes')->nullable();
            $table->tinyInteger('district')->nullable();
            $table->tinyInteger('projected_lanes')->nullable();
            $table->text('miles')->nullable();
            $table->tinyInteger('county')->nullable();
            $table->tinyInteger('incorporated_city')->nullable();
            $table->text('sponsor_entity')->nullable();

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

            $table->text('description_goal_1')->nullable();
            $table->text('description_goal_2')->nullable();
            $table->text('description_goal_3')->nullable();
            $table->text('description_goal_4')->nullable();
            $table->text('description_goal_5')->nullable();
            $table->text('description_goal_6')->nullable();

            $table->boolean('strategy_1')->nullable();
            $table->boolean('strategy_2')->nullable();
            $table->boolean('strategy_3')->nullable();
            $table->boolean('strategy_4')->nullable();
            $table->boolean('strategy_5')->nullable();
            $table->boolean('strategy_6')->nullable();

            $table->text('description_strategy_1')->nullable();
            $table->text('description_strategy_2')->nullable();
            $table->text('description_strategy_3')->nullable();
            $table->text('description_strategy_4')->nullable();
            $table->text('description_strategy_5')->nullable();
            $table->text('description_strategy_6')->nullable();
            
            // F2
            $table->text('description_strategy_7')->nullable();
            $table->text('description_strategy_8')->nullable();
            $table->text('description_strategy_9')->nullable();
            $table->text('description_strategy_10')->nullable();

            $table->text('voc')->nullable();
            $table->text('c0')->nullable();
            $table->text('nox')->nullable();
            $table->text('pm10')->nullable();
            $table->text('prepared_by')->nullable();

            $table->text('section_5309')->nullable();
            $table->text('appointment_year')->nullable();
            $table->text('tdc_award_amount')->nullable();
            $table->text('tdw_award_date')->nullable();
            $table->text('tdc_amount_requested')->nullable();

            $table->boolean('type_capital')->nullable();
            $table->boolean('type_operating')->nullable();
            $table->boolean('type_planning')->nullable();
            $table->boolean('type_administration')->nullable();
            $table->tinyInteger('block_system')->nullable();

            $table->tinyInteger('reviewed_dates')->nullable(); // F2

            // Page 3
            $table->date('schematic_start_date')->nullable();
            $table->date('schematic_end_date')->nullable();
            $table->tinyInteger('schematic_progress')->nullable();
            $table->tinyInteger('schematic_agency')->nullable();
            $table->text('schematic_comments')->nullable();

            $table->date('envdoctype_start_date')->nullable();
            $table->date('envdoctype_end_date')->nullable();
            $table->tinyInteger('envdoctype_progress')->nullable();
            $table->tinyInteger('envdoctype_agency')->nullable();
            $table->text('envdoctype_comments')->nullable();

            $table->date('envdoc_start_date')->nullable();
            $table->date('envdoc_end_date')->nullable();
            $table->tinyInteger('envdoc_progress')->nullable();
            $table->tinyInteger('envdoc_agency')->nullable();
            $table->text('envdoc_comments')->nullable();

            $table->date('pse_start_date')->nullable();
            $table->date('pse_end_date')->nullable();
            $table->tinyInteger('pse_progress')->nullable();
            $table->tinyInteger('pse_agency')->nullable();
            $table->text('pse_comments')->nullable();

            $table->date('rowmap_start_date')->nullable();
            $table->date('rowmap_end_date')->nullable();
            $table->tinyInteger('rowmap_progress')->nullable();
            $table->tinyInteger('rowmap_agency')->nullable();
            $table->text('rowmap_comments')->nullable();

            $table->date('rowacq_start_date')->nullable();
            $table->date('rowacq_end_date')->nullable();
            $table->tinyInteger('rowacq_progress')->nullable();
            $table->tinyInteger('rowacq_agency')->nullable();
            $table->text('rowacq_comments')->nullable();
            
            $table->date('utilities_start_date')->nullable();
            $table->date('utilities_end_date')->nullable();
            $table->tinyInteger('utilities_progress')->nullable();
            $table->tinyInteger('utilities_agency')->nullable();
            $table->text('utilities_comments')->nullable();
            
            $table->date('pubinv_start_date')->nullable();
            $table->date('pubinv_end_date')->nullable();
            $table->tinyInteger('pubinv_progress')->nullable();
            $table->tinyInteger('pubinv_agency')->nullable();
            $table->text('pubinv_comments')->nullable();
            
            $table->date('distrev_start_date')->nullable();
            $table->date('distrev_end_date')->nullable();
            $table->tinyInteger('distrev_progress')->nullable();
            $table->tinyInteger('distrev_agency')->nullable();
            $table->text('distrev_comments')->nullable();

            $table->date('agree_start_date')->nullable();
            $table->date('agree_end_date')->nullable();
            $table->tinyInteger('agree_progress')->nullable();
            $table->tinyInteger('agree_agency')->nullable();
            $table->text('agree_comments')->nullable();

            $table->date('procpro_start_date')->nullable();
            $table->date('procpro_end_date')->nullable();
            $table->tinyInteger('procpro_progress')->nullable();
            $table->tinyInteger('procpro_agency')->nullable();
            $table->text('procpro_comments')->nullable();

            $table->date('letdate_start_date')->nullable();
            $table->date('letdate_end_date')->nullable();
            $table->tinyInteger('letdate_progress')->nullable();
            $table->tinyInteger('letdate_agency')->nullable();
            $table->text('letdate_comments')->nullable();

            $table->date('consper_end_date_start_date')->nullable();
            $table->date('consper_end_date_end_date')->nullable();
            $table->tinyInteger('consper_end_date_progress')->nullable();
            $table->tinyInteger('consper_end_date_agency')->nullable();
            $table->text('consper_end_date_comments')->nullable();

            $table->date('peperf_start_date')->nullable();
            $table->date('peperf_end_date')->nullable();
            $table->tinyInteger('peperf_progress')->nullable();
            $table->tinyInteger('peperf_agency')->nullable();
            $table->text('peperf_comments')->nullable();

            $table->date('fta_trans_start_date')->nullable();
            $table->date('fta_trans_end_date')->nullable();
            $table->tinyInteger('fta_trans_progress')->nullable();
            $table->tinyInteger('fta_trans_agency')->nullable();
            $table->text('fta_trans_comments')->nullable();

            $table->date('active_fta_start_date')->nullable();
            $table->date('active_fta_end_date')->nullable();
            $table->tinyInteger('active_fta_progress')->nullable();
            $table->tinyInteger('active_fta_agency')->nullable();
            $table->text('active_fta_comments')->nullable();

            $table->date('bus_start_date')->nullable();
            $table->date('bus_end_date')->nullable();
            $table->tinyInteger('bus_progress')->nullable();
            $table->tinyInteger('bus_agency')->nullable();
            $table->text('bus_comments')->nullable();

            $table->date('delivery_start_date')->nullable();
            $table->date('delivery_end_date')->nullable();
            $table->tinyInteger('delivery_progress')->nullable();
            $table->tinyInteger('delivery_agency')->nullable();
            $table->text('delivery_comments')->nullable();

            $table->date('other_start_date')->nullable();
            $table->date('other_end_date')->nullable();
            $table->tinyInteger('other_progress')->nullable();
            $table->tinyInteger('other_agency')->nullable();
            $table->text('other_comments')->nullable();

            $table->boolean('reviewed_yes')->nullable();
            $table->boolean('reviewed_no')->nullable();
            $table->boolean('reviewed_na')->nullable();
            $table->date('date_reviewed')->nullable();

            // Project Phases

            $table->boolean('fta_transfer')->nullable();
            // F2
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

            $table->json('funding_category')->nullable();
            $table->json('funding_federal')->nullable();
            $table->json('funding_state')->nullable();
            $table->json('funding_local')->nullable();
            $table->json('funding_local_beyond')->nullable();
            $table->json('funding_total')->nullable();

            $table->Integer('funding_federal_result')->nullable();
            $table->Integer('funding_state_result')->nullable();
            $table->Integer('funding_local_result')->nullable();
            $table->Integer('funding_local_beyond_result')->nullable();
            $table->Integer('funding_total_result')->nullable();

            $table->boolean('mpo_funds_2')->nullable();
            $table->Integer('yoe_cost_vehicles')->nullable();
            $table->json('funding_category_vehicles')->nullable();
            $table->json('funding_federal_vehicles')->nullable();
            $table->json('funding_local_vehicles')->nullable();
            $table->json('funding_local_beyond_vehicles')->nullable();
            $table->json('funding_total_vehicles')->nullable();
            $table->json('funding_tdc_vehicles')->nullable();
            $table->Integer('funding_federal_vehicles_total')->nullable();
            $table->Integer('funding_local_vehicles_total')->nullable();
            $table->Integer('funding_local_beyond_vehicles_total')->nullable();
            $table->Integer('funding_total_vehicles_total')->nullable();
            $table->Integer('funding_tdc_vehicles_total')->nullable();

            $table->Integer('yoe_cost_bus')->nullable();
            $table->json('funding_category_bus')->nullable();
            $table->json('funding_federal_bus')->nullable();
            $table->json('funding_local_bus')->nullable();
            $table->json('funding_local_beyond_bus')->nullable();
            $table->json('funding_total_bus')->nullable();
            $table->json('funding_tdc_bus')->nullable();
            $table->Integer('funding_federal_bus_total')->nullable();
            $table->Integer('funding_local_bus_total')->nullable();
            $table->Integer('funding_local_beyond_bus_total')->nullable();
            $table->Integer('funding_total_bus_total')->nullable();
            $table->Integer('funding_tdc_bus_total')->nullable();

            $table->Integer('yoe_cost_operations')->nullable();
            $table->json('funding_category_operations')->nullable();
            $table->json('funding_federal_operations')->nullable();
            $table->json('funding_local_operations')->nullable();
            $table->json('funding_local_beyond_operations')->nullable();
            //$table->json('funding_total_operations')->nullable();
            $table->Integer('funding_total_operations')->nullable();
            $table->Integer('funding_federal_operations_total')->nullable();
            $table->Integer('funding_local_operations_total')->nullable();
            $table->Integer('funding_local_beyond_operations_total')->nullable();
            $table->Integer('funding_total_operations_total')->nullable();

            $table->text('local_pm_name')->nullable();
            $table->text('local_pm_phone')->nullable();
            $table->text('local_pm_email')->nullable();
            $table->text('local_pm_agency')->nullable();
            $table->text('local_pm_title')->nullable();

            $table->text('state_pm_name')->nullable();
            $table->text('state_pm_phone')->nullable();
            $table->text('state_pm_email')->nullable();
            $table->text('state_pm_agency')->nullable();
            $table->text('state_pm_title')->nullable();

            $table->text('sponsor_name')->nullable();
            $table->text('sponsor_phone')->nullable();
            $table->text('sponsor_email')->nullable();
            $table->text('sponsor_agency')->nullable();
            $table->text('sponsor_title')->nullable();
            
            $table->text('sponsor')->nullable();
            $table->text('contact_name')->nullable();
            $table->text('contact_phone')->nullable();
            $table->text('contact_email')->nullable();
            $table->text('contact_agency')->nullable();
            $table->text('contact_title')->nullable();

            $table->text('signature')->nullable();
            $table->text('comments')->nullable();

            //$table->json('crash_categories')->nullable();
            // This fields should later be stored as one json.
            $table->float('pavement_good_condition',8,2)->nullable();
            $table->float('pavement_fair_condition',8,2)->nullable();
            $table->float('pavement_poor_condition',8,2)->nullable();
            $table->Integer('total_crash_EP')->nullable();
            $table->Integer('fatal_crash_EP')->nullable();
            $table->Integer('injury_crash_EP')->nullable();
            $table->Integer('pedestrian_crash_EP')->nullable();
            $table->Integer('total_crash_DA')->nullable();
            $table->Integer('fatal_crash_DA')->nullable();
            $table->Integer('injury_crash_DA')->nullable();
            $table->Integer('pedestrian_crash_DA')->nullable();
            $table->Integer('good_bridges')->nullable();
            $table->Integer('fair_bridges')->nullable();
            $table->Integer('poor_bridges')->nullable();
            $table->float('good_area',8,2)->nullable();
            $table->float('fair_area',8,2)->nullable();
            $table->float('poor_area',8,2)->nullable();
            
            $table->json("points")->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}