<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();
        $statuses = ['In Progress', 'Submitted', 'Completed'];
        return view('projects.index', compact('projects', 'statuses'));
    }


    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {

        // dd($request);

        request()->validate([
            'name' => 'required',
        ]);

        $project = new Project();

        $project->agency_id = auth()->user()->agency_id;
        $project->parent_id = request('parent_id');
        $project->mpo_id = request('mpo_id');
        $project->csj_cn = request('csj_cn');
        $project->name = request('name');
        $project->description = request('description');
        $project->limit_from = request('limit_from');
        $project->limit_to = request('limit_to');
        $project->relationship_description = request('relationship_description');
        $project->need_purpose = request('need_purpose');
        $project->agency_comments = request('agency_comments');
        $project->existing_lanes = request('existing_lanes');
        $project->projected_lanes = request('projected_lanes');
        $project->miles = request('miles');
        $project->hwrw_funds_request = request('hwrw_funds_request') == 'on' ? 1 : null;
        $project->transit_funds_request = request('transit_funds_request') == 'on' ? 1 : null;
        $project->fiscal_year = request('fiscal_year');
        $project->hwrw_name = request('hwrw_name');
        $project->network_year = request('network_year');
        $project->type = request('type');
        $project->on_state = request('on_state') == 'on' ? true : false;
        $project->off_state = request('off_state') == 'on' ? true : false;
        $project->capacity_project = request('capacity_project') == 'on' ? true : false;
        $project->classification = request('classification');
        $project->district = request('district') == '----' ? null : request('district');
        $project->county = request('county') == '----' ? null : request('county');
        $project->incorporated_city = request('incorporated_city') == '----' ? null : request('incorporated_city');
        $project->sponsor_entity = request('sponsor_entity');
        $project->psp_1 = request('psp_1') == '----' ? null : request('psp_1');
        $project->psp_2 = request('psp_2') == '----' ? null : request('psp_2');
        $project->psp_3 = request('psp_3') == '----' ? null : request('psp_3');
        $project->psp_4 = request('psp_4') == '----' ? null : request('psp_4');
        $project->psp_5 = request('psp_5') == '----' ? null : request('psp_5');
        $project->psp_6 = request('psp_6') == '----' ? null : request('psp_6');
        $project->goal_1 = request('goal_1') == 'on' ? true : false;
        $project->goal_2 = request('goal_2') == 'on' ? true : false;
        $project->goal_3 = request('goal_3') == 'on' ? true : false;
        $project->goal_4 = request('goal_4') == 'on' ? true : false;
        $project->goal_5 = request('goal_5') == 'on' ? true : false;
        $project->goal_6 = request('goal_6') == 'on' ? true : false;
        $project->description_goal_1 = request('description_goal_1');
        $project->description_goal_2 = request('description_goal_2');
        $project->description_goal_3 = request('description_goal_3');
        $project->description_goal_4 = request('description_goal_4');
        $project->description_goal_5 = request('description_goal_5');
        $project->description_goal_6 = request('description_goal_6');
        $project->strategy_1 = request('strategy_1') == 'on' ? true : false;
        $project->strategy_2 = request('strategy_2') == 'on' ? true : false;
        $project->strategy_3 = request('strategy_3') == 'on' ? true : false;
        $project->strategy_4 = request('strategy_4') == 'on' ? true : false;
        $project->strategy_5 = request('strategy_5') == 'on' ? true : false;
        $project->strategy_6 = request('strategy_6') == 'on' ? true : false;
        $project->description_strategy_1 = request('description_strategy_1');
        $project->description_strategy_2 = request('description_strategy_2');
        $project->description_strategy_3 = request('description_strategy_3');
        $project->description_strategy_4 = request('description_strategy_4');
        $project->description_strategy_5 = request('description_strategy_5');
        $project->description_strategy_6 = request('description_strategy_6');
        $project->voc = request('voc');
        $project->c0 = request('c0');
        $project->nox = request('nox');
        $project->pm10 = request('pm10');
        $project->prepared_by = request('prepared_by');
        $project->section_5309 = request('section_5309');
        $project->appointment_year = request('appointment_year');
        $project->tdc_award_amount = request('tdc_award_amount');
        $project->tdw_award_date = request('tdw_award_date');
        $project->tdc_amount_requested = request('tdc_amount_requested');
        $project->type_capital = request('type_capital') == 'on' ? 1 : null;
        $project->type_operating = request('type_operating') == 'on' ? 1 : null;
        $project->type_planning = request('type_planning') == 'on' ? 1 : null;
        $project->type_administration = request('type_administration') == 'on' ? 1 : null;
        $project->block_system = request('block_system');
        $project->schematic_start_date = request('schematic_start_date');
        $project->schematic_end_date = request('schematic_end_date');
        $project->schematic_progress = request('schematic_progress') == '----' ? null : request('schematic_progress');
        $project->schematic_agency = request('schematic_agency') == '----' ? null : request('schematic_agency');
        $project->schematic_comments = request('schematic_comments');
        $project->envdoctype_start_date = request('envdoctype_start_date');
        $project->envdoctype_end_date = request('envdoctype_end_date');
        $project->envdoctype_progress = request('envdoctype_progress') == '----' ? null : request('envdoctype_progress');
        $project->envdoctype_agency = request('envdoctype_agency') == '----' ? null : request('envdoctype_agency');
        $project->envdoctype_comments = request('envdoctype_comments');
        $project->envdoc_start_date = request('envdoc_start_date');
        $project->envdoc_end_date = request('envdoc_end_date');
        $project->envdoc_progress = request('envdoc_progress') == '----' ? null : request('envdoc_progress');
        $project->envdoc_agency = request('envdoc_agency') == '----' ? null : request('envdoc_agency');
        $project->envdoc_comments = request('envdoc_comments');
        $project->pse_start_date = request('pse_start_date');
        $project->pse_end_date = request('pse_end_date');
        $project->pse_progress = request('pse_progress') == '----' ? null : request('pse_progress');
        $project->pse_agency = request('pse_agency') == '----' ? null : request('pse_agency');
        $project->pse_comments = request('pse_comments');
        $project->rowmap_start_date = request('rowmap_start_date');
        $project->rowmap_end_date = request('rowmap_end_date');
        $project->rowmap_progress = request('rowmap_progress') == '----' ? null : request('rowmap_progress');
        $project->rowmap_agency = request('rowmap_agency') == '----' ? null : request('rowmap_agency');
        $project->rowmap_comments = request('rowmap_comments');
        $project->rowacq_start_date = request('rowacq_start_date');
        $project->rowacq_end_date = request('rowacq_end_date');
        $project->rowacq_progress = request('rowacq_progress') == '----' ? null : request('rowacq_progress');
        $project->rowacq_agency = request('rowacq_agency') == '----' ? null : request('rowacq_agency');
        $project->rowacq_comments = request('rowacq_comments');
        $project->utilities_start_date = request('utilities_start_date');
        $project->utilities_end_date = request('utilities_end_date');
        $project->utilities_progress = request('utilities_progress') == '----' ? null : request('utilities_progress');
        $project->utilities_agency = request('utilities_agency') == '----' ? null : request('utilities_agency');
        $project->utilities_comments = request('utilities_comments');
        $project->pubinv_start_date = request('pubinv_start_date');
        $project->pubinv_end_date = request('pubinv_end_date');
        $project->pubinv_progress = request('pubinv_progress') == '----' ? null : request('pubinv_progress');
        $project->pubinv_agency = request('pubinv_agency') == '----' ? null : request('pubinv_agency');
        $project->pubinv_comments = request('pubinv_comments');
        $project->distrev_start_date = request('distrev_start_date');
        $project->distrev_end_date = request('distrev_end_date');
        $project->distrev_progress = request('distrev_progress') == '----' ? null : request('distrev_progress');
        $project->distrev_agency = request('distrev_agency') == '----' ? null : request('distrev_agency');
        $project->distrev_comments = request('distrev_comments');
        $project->agree_start_date = request('agree_start_date');
        $project->agree_end_date = request('agree_end_date');
        $project->agree_progress = request('agree_progress') == '----' ? null : request('agree_progress');
        $project->agree_agency = request('agree_agency') == '----' ? null : request('agree_agency');
        $project->agree_comments = request('agree_comments');
        $project->procpro_start_date = request('procpro_start_date');
        $project->procpro_end_date = request('procpro_end_date');
        $project->procpro_progress = request('procpro_progress') == '----' ? null : request('procpro_progress');
        $project->procpro_agency = request('procpro_agency') == '----' ? null : request('procpro_agency');
        $project->procpro_comments = request('procpro_comments');
        $project->letdate_start_date = request('letdate_start_date');
        $project->letdate_end_date = request('letdate_end_date');
        $project->letdate_progress = request('letdate_progress') == '----' ? null : request('letdate_progress');
        $project->letdate_agency = request('letdate_agency') == '----' ? null : request('letdate_agency');
        $project->letdate_comments = request('letdate_comments');
        $project->consper_end_date_start_date = request('consper_end_date_start_date');
        $project->consper_end_date_end_date = request('consper_end_date_end_date');
        $project->consper_end_date_progress = request('consper_end_date_progress') == '----' ? null : request('consper_end_date_progress');
        $project->consper_end_date_agency = request('consper_end_date_agency') == '----' ? null : request('consper_end_date_agency');
        $project->consper_end_date_comments = request('consper_end_date_comments');
        $project->peperf_start_date = request('peperf_start_date');
        $project->peperf_end_date = request('peperf_end_date');
        $project->peperf_progress = request('peperf_progress') == '----' ? null : request('peperf_progress');
        $project->peperf_agency = request('peperf_agency') == '----' ? null : request('peperf_agency');
        $project->peperf_comments = request('peperf_comments');

        $project->save();

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        request()->validate([
            'name' => 'required',
        ]);

        $project->mpo_id = request('mpo_id');
        $project->csj_cn = request('csj_cn');
        $project->name = request('name');
        $project->description = request('description');
        $project->limit_from = request('limit_from');
        $project->limit_to = request('limit_to');
        $project->relationship_description = request('relationship_description');
        $project->need_purpose = request('need_purpose');
        $project->agency_comments = request('agency_comments');
        $project->existing_lanes = request('existing_lanes');
        $project->projected_lanes = request('projected_lanes');
        $project->miles = request('miles');
        $project->hwrw_funds_request = request('hwrw_funds_request') == 'on' ? 1 : null;
        $project->transit_funds_request = request('transit_funds_request') == 'on' ? 1 : null;
        $project->fiscal_year = request('fiscal_year');
        $project->hwrw_name = request('hwrw_name');
        $project->network_year = request('network_year');
        $project->type = request('type');
        $project->on_state = request('on_state') == 'on' ? true : false;
        $project->off_state = request('off_state') == 'on' ? true : false;
        $project->capacity_project = request('capacity_project') == 'on' ? true : false;
        $project->classification = request('classification');
        $project->district = request('district') == '----' ? null : request('district');
        $project->county = request('county') == '----' ? null : request('county');
        $project->incorporated_city = request('incorporated_city') == '----' ? null : request('incorporated_city');
        $project->sponsor_entity = request('sponsor_entity');
        $project->psp_1 = request('psp_1') == '----' ? null : request('psp_1');
        $project->psp_2 = request('psp_2') == '----' ? null : request('psp_2');
        $project->psp_3 = request('psp_3') == '----' ? null : request('psp_3');
        $project->psp_4 = request('psp_4') == '----' ? null : request('psp_4');
        $project->psp_5 = request('psp_5') == '----' ? null : request('psp_5');
        $project->psp_6 = request('psp_6') == '----' ? null : request('psp_6');
        $project->goal_1 = request('goal_1') == 'on' ? true : false;
        $project->goal_2 = request('goal_2') == 'on' ? true : false;
        $project->goal_3 = request('goal_3') == 'on' ? true : false;
        $project->goal_4 = request('goal_4') == 'on' ? true : false;
        $project->goal_5 = request('goal_5') == 'on' ? true : false;
        $project->goal_6 = request('goal_6') == 'on' ? true : false;
        $project->description_goal_1 = request('description_goal_1');
        $project->description_goal_2 = request('description_goal_2');
        $project->description_goal_3 = request('description_goal_3');
        $project->description_goal_4 = request('description_goal_4');
        $project->description_goal_5 = request('description_goal_5');
        $project->description_goal_6 = request('description_goal_6');
        $project->strategy_1 = request('strategy_1') == 'on' ? true : false;
        $project->strategy_2 = request('strategy_2') == 'on' ? true : false;
        $project->strategy_3 = request('strategy_3') == 'on' ? true : false;
        $project->strategy_4 = request('strategy_4') == 'on' ? true : false;
        $project->strategy_5 = request('strategy_5') == 'on' ? true : false;
        $project->strategy_6 = request('strategy_6') == 'on' ? true : false;
        $project->description_strategy_1 = request('description_strategy_1');
        $project->description_strategy_2 = request('description_strategy_2');
        $project->description_strategy_3 = request('description_strategy_3');
        $project->description_strategy_4 = request('description_strategy_4');
        $project->description_strategy_5 = request('description_strategy_5');
        $project->description_strategy_6 = request('description_strategy_6');
        $project->voc = request('voc');
        $project->c0 = request('c0');
        $project->nox = request('nox');
        $project->pm10 = request('pm10');
        $project->prepared_by = request('prepared_by');
        $project->section_5309 = request('section_5309');
        $project->appointment_year = request('appointment_year');
        $project->tdc_award_amount = request('tdc_award_amount');
        $project->tdw_award_date = request('tdw_award_date');
        $project->tdc_amount_requested = request('tdc_amount_requested');
        $project->type_capital = request('type_capital') == 'on' ? 1 : null;
        $project->type_operating = request('type_operating') == 'on' ? 1 : null;
        $project->type_planning = request('type_planning') == 'on' ? 1 : null;
        $project->type_administration = request('type_administration') == 'on' ? 1 : null;
        $project->block_system = request('block_system');
        $project->schematic_start_date = request('schematic_start_date');
        $project->schematic_end_date = request('schematic_end_date');
        $project->schematic_progress = request('schematic_progress') == '----' ? null : request('schematic_progress');
        $project->schematic_agency = request('schematic_agency') == '----' ? null : request('schematic_agency');
        $project->schematic_comments = request('schematic_comments');
        $project->envdoctype_start_date = request('envdoctype_start_date');
        $project->envdoctype_end_date = request('envdoctype_end_date');
        $project->envdoctype_progress = request('envdoctype_progress') == '----' ? null : request('envdoctype_progress');
        $project->envdoctype_agency = request('envdoctype_agency') == '----' ? null : request('envdoctype_agency');
        $project->envdoctype_comments = request('envdoctype_comments');
        $project->envdoc_start_date = request('envdoc_start_date');
        $project->envdoc_end_date = request('envdoc_end_date');
        $project->envdoc_progress = request('envdoc_progress') == '----' ? null : request('envdoc_progress');
        $project->envdoc_agency = request('envdoc_agency') == '----' ? null : request('envdoc_agency');
        $project->envdoc_comments = request('envdoc_comments');
        $project->pse_start_date = request('pse_start_date');
        $project->pse_end_date = request('pse_end_date');
        $project->pse_progress = request('pse_progress') == '----' ? null : request('pse_progress');
        $project->pse_agency = request('pse_agency') == '----' ? null : request('pse_agency');
        $project->pse_comments = request('pse_comments');
        $project->rowmap_start_date = request('rowmap_start_date');
        $project->rowmap_end_date = request('rowmap_end_date');
        $project->rowmap_progress = request('rowmap_progress') == '----' ? null : request('rowmap_progress');
        $project->rowmap_agency = request('rowmap_agency') == '----' ? null : request('rowmap_agency');
        $project->rowmap_comments = request('rowmap_comments');
        $project->rowacq_start_date = request('rowacq_start_date');
        $project->rowacq_end_date = request('rowacq_end_date');
        $project->rowacq_progress = request('rowacq_progress') == '----' ? null : request('rowacq_progress');
        $project->rowacq_agency = request('rowacq_agency') == '----' ? null : request('rowacq_agency');
        $project->rowacq_comments = request('rowacq_comments');
        $project->utilities_start_date = request('utilities_start_date');
        $project->utilities_end_date = request('utilities_end_date');
        $project->utilities_progress = request('utilities_progress') == '----' ? null : request('utilities_progress');
        $project->utilities_agency = request('utilities_agency') == '----' ? null : request('utilities_agency');
        $project->utilities_comments = request('utilities_comments');
        $project->pubinv_start_date = request('pubinv_start_date');
        $project->pubinv_end_date = request('pubinv_end_date');
        $project->pubinv_progress = request('pubinv_progress') == '----' ? null : request('pubinv_progress');
        $project->pubinv_agency = request('pubinv_agency') == '----' ? null : request('pubinv_agency');
        $project->pubinv_comments = request('pubinv_comments');
        $project->distrev_start_date = request('distrev_start_date');
        $project->distrev_end_date = request('distrev_end_date');
        $project->distrev_progress = request('distrev_progress') == '----' ? null : request('distrev_progress');
        $project->distrev_agency = request('distrev_agency') == '----' ? null : request('distrev_agency');
        $project->distrev_comments = request('distrev_comments');
        $project->agree_start_date = request('agree_start_date');
        $project->agree_end_date = request('agree_end_date');
        $project->agree_progress = request('agree_progress') == '----' ? null : request('agree_progress');
        $project->agree_agency = request('agree_agency') == '----' ? null : request('agree_agency');
        $project->agree_comments = request('agree_comments');
        $project->procpro_start_date = request('procpro_start_date');
        $project->procpro_end_date = request('procpro_end_date');
        $project->procpro_progress = request('procpro_progress') == '----' ? null : request('procpro_progress');
        $project->procpro_agency = request('procpro_agency') == '----' ? null : request('procpro_agency');
        $project->procpro_comments = request('procpro_comments');
        $project->letdate_start_date = request('letdate_start_date');
        $project->letdate_end_date = request('letdate_end_date');
        $project->letdate_progress = request('letdate_progress') == '----' ? null : request('letdate_progress');
        $project->letdate_agency = request('letdate_agency') == '----' ? null : request('letdate_agency');
        $project->letdate_comments = request('letdate_comments');
        $project->consper_end_date_start_date = request('consper_end_date_start_date');
        $project->consper_end_date_end_date = request('consper_end_date_end_date');
        $project->consper_end_date_progress = request('consper_end_date_progress') == '----' ? null : request('consper_end_date_progress');
        $project->consper_end_date_agency = request('consper_end_date_agency') == '----' ? null : request('consper_end_date_agency');
        $project->consper_end_date_comments = request('consper_end_date_comments');
        $project->peperf_start_date = request('peperf_start_date');
        $project->peperf_end_date = request('peperf_end_date');
        $project->peperf_progress = request('peperf_progress') == '----' ? null : request('peperf_progress');
        $project->peperf_agency = request('peperf_agency') == '----' ? null : request('peperf_agency');
        $project->peperf_comments = request('peperf_comments');

        $project->save();

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('projects.index'));
    }
}
