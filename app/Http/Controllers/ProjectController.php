<?php

namespace App\Http\Controllers;

use App\Project;
use App\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Exporter;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all()->where('parent_id', null);
        $agencies = Agency::all();
        $statuses = ['In Progress', 'PM Pending Review', 'Submitted', 'Approved', 'In Progress [Returned for Revision]'];
        return view('projects.index', compact('projects', 'statuses', 'agencies'));
    }

    public function revisions($id)
    {
        $projects = Project::orderBy('created_at', 'asc')->where('parent_id', $id)->get();
        $projects->prepend(Project::find($id));
        $agencies = Agency::all();
        $counts = [0, 0, 0, 0, 0];
        $statuses = ['In Progress', 'PM Pending Review', 'Submitted', 'Approved', 'In Progress [Returned for Revision]'];
        return view('projects.revisions', compact('projects', 'statuses', 'agencies', 'counts'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function exportExcel(Project $project)
    {
        $columns = $project->getTableColumns();
        $projects = $project->getAll2($project->id);
        
        $data = new collection();
        foreach ($columns as $column) {
            $data[0] = (object) $column;
        }
        $data = $data->merge($projects);  
        $fileName = "Projects.xlsx";
        $excel = Exporter::make('Excel');
        $excel->load($data);
        return $excel->stream($fileName);
    }

    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required',
        ]);

        $project = new Project();

        $project->agency_id = auth()->user()->agency_id;
        $project->project_type = request('project_type');
        $project->parent_id = request('parent_id');
        $project->mpo_id = request('mpo_id');
        $project->csj_cn = request('csj_cn');
        $project->author = auth()->user()->name;
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
        $project->network_year = request('network_year') == '----' ? null : request('network_year');
        $project->type = request('type') == '----' ? null : request('type');
        $project->on_state = request('on_state') == 'on' ? true : false;
        $project->off_state = request('off_state') == 'on' ? true : false;
        $project->capacity_project = request('capacity_project') == 'on' ? true : false;
        $project->classification = request('classification') == '----' ? null : request('classification');
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
        $project->strategy_1 = request('strategy_1') == '----' ? null : request('strategy_1');
        $project->strategy_2 = request('strategy_2') == '----' ? null : request('strategy_2');
        $project->strategy_3 = request('strategy_3') == '----' ? null : request('strategy_3');
        $project->strategy_4 = request('strategy_4') == '----' ? null : request('strategy_4');
        $project->strategy_5 = request('strategy_5') == '----' ? null : request('strategy_5');
        $project->strategy_6 = request('strategy_6') == '----' ? null : request('strategy_6');
        $project->description_strategy_1 = request('description_strategy_1');
        $project->description_strategy_2 = request('description_strategy_2');
        $project->description_strategy_3 = request('description_strategy_3');
        $project->description_strategy_4 = request('description_strategy_4');
        $project->description_strategy_5 = request('description_strategy_5');
        $project->description_strategy_6 = request('description_strategy_6');
        $project->description_strategy_7 = request('description_strategy_7');
        $project->description_strategy_8 = request('description_strategy_8');
        $project->description_strategy_9 = request('description_strategy_9');
        $project->description_strategy_10 = request('description_strategy_10');
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
        $project->reviewed_dates = request('reviewed_dates');
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
        $project->fta_trans_start_date = request('fta_trans_start_date');
        $project->fta_trans_end_date = request('fta_trans_end_date');
        $project->fta_trans_progress = request('fta_trans_progress') == '----' ? null : request('fta_trans_progress');
        $project->fta_trans_agency = request('fta_trans_agency') == '----' ? null : request('fta_trans_agency');
        $project->fta_trans_comments = request('fta_trans_comments');
        $project->active_fta_start_date = request('active_fta_start_date');
        $project->active_fta_end_date = request('active_fta_end_date');
        $project->active_fta_progress = request('active_fta_progress') == '----' ? null : request('active_fta_progress');
        $project->active_fta_agency = request('active_fta_agency') == '----' ? null : request('active_fta_agency');
        $project->active_fta_comments = request('active_fta_comments');
        $project->bus_start_date = request('bus_start_date');
        $project->bus_end_date = request('bus_end_date');
        $project->bus_progress = request('bus_progress') == '----' ? null : request('bus_progress');
        $project->bus_agency = request('bus_agency') == '----' ? null : request('bus_agency');
        $project->bus_comments = request('bus_comments');
        $project->delivery_start_date = request('delivery_start_date');
        $project->delivery_end_date = request('delivery_end_date');
        $project->delivery_progress = request('delivery_progress') == '----' ? null : request('delivery_progress');
        $project->delivery_agency = request('delivery_agency') == '----' ? null : request('delivery_agency');
        $project->delivery_comments = request('delivery_comments');
        $project->other_start_date = request('other_start_date');
        $project->other_end_date = request('other_end_date');
        $project->other_progress = request('other_progress') == '----' ? null : request('other_progress');
        $project->other_agency = request('other_agency') == '----' ? null : request('other_agency');
        $project->other_comments = request('other_comments');
        $project->reviewed_yes = request('reviewed_yes') == 'on' ? 1 : null;
        $project->reviewed_no = request('reviewed_no') == 'on' ? 1 : null;
        $project->reviewed_na = request('reviewed_na') == 'on' ? 1 : null;
        $project->date_reviewed = request('date_reviewed');
        $project->fta_transfer = request('fta_transfer') == 'on' ? 1 : null;
        $project->capital = request('capital') == 'on' ? 1 : null;
        $project->operations = request('operations') == 'on' ? 1 : null;
        $project->c = request('c') == 'on' ? 1 : null;
        $project->nonc = request('nonc') == 'on' ? 1 : null;
        $project->pe = request('pe') == 'on' ? 1 : null;
        $project->env = request('env') == 'on' ? 1 : null;
        $project->eng = request('eng') == 'on' ? 1 : null;
        $project->r = request('r') == 'on' ? 1 : null;
        $project->acq = request('acq') == 'on' ? 1 : null;
        $project->utl = request('utl') == 'on' ? 1 : null;
        $project->subtotal_amount = request('subtotal_amount') == '----' ? null : request('subtotal_amount');
        $project->non_construction_amount = request('non_construction_amount') == '----' ? null : request('non_construction_amount');
        $project->construction_amount = request('construction_amount') == '----' ? null : request('construction_amount');
        $project->ce_amount = request('ce_amount') == '----' ? null : request('ce_amount');
        $project->contingencies_amount = request('contingencies_amount') == '----' ? null : request('contingencies_amount');
        $project->change_order_amount = request('change_order_amount') == '----' ? null : request('change_order_amount');
        $project->PE_amount = request('PE_amount') == '----' ? null : request('PE_amount');
        $project->indirects_amount = request('indirects_amount') == '----' ? null : request('indirects_amount');
        $project->ROW_amount = request('ROW_amount') == '----' ? null : request('ROW_amount');
        $project->transfer_amount = request('transfer_amount') == '----' ? null : request('transfer_amount');
        $project->total_amount = request('total_amount') == '----' ? null : request('total_amount');
        $project->costs_1 = request('costs_1') == '----' ? null : request('costs_1');
        $project->costs_2 = request('costs_2') == '----' ? null : request('costs_2');
        $project->costs_3 = request('costs_3') == '----' ? null : request('costs_3');
        $project->costs_4 = request('costs_4') == '----' ? null : request('costs_4');
        $project->mpo_funds = request('mpo_funds') == 'on' ? 1 : null;
        $project->yoe_cost = request('yoe_cost') == '----' ? null : request('yoe_cost');
        
        $project->funding_category = request('funding_category');
        $project->funding_federal = request('funding_federal');
        $project->funding_state = request('funding_state');
        $project->funding_local = request('funding_local');
        $project->funding_local_beyond = request('funding_local_beyond');
        $project->funding_total = request('funding_total');

        $project->funding_federal_result = request('funding_federal_result') == '----' ? null : request('funding_federal_result');
        $project->funding_state_result = request('funding_state_result') == '----' ? null : request('funding_state_result');
        $project->funding_local_result = request('funding_local_result') == '----' ? null : request('funding_local_result');
        $project->funding_local_beyond_result = request('funding_local_beyond_result') == '----' ? null : request('funding_local_beyond_result');
        $project->funding_total_result = request('funding_total_result') == '----' ? null : request('funding_total_result');
        $project->mpo_funds_2 = request('mpo_funds_2') == 'on' ? 1 : null;
        $project->yoe_cost_vehicles = request('yoe_cost_vehicles') == '----' ? null : request('yoe_cost_vehicles');

        $project->funding_category_vehicles = request('funding_category_vehicles');
        $project->funding_federal_vehicles = request('funding_federal_vehicles');
        $project->funding_local_vehicles = request('funding_local_vehicles');
        $project->funding_local_beyond_vehicles = request('funding_local_beyond_vehicles');
        $project->funding_total_vehicles = request('funding_total_vehicles');
        $project->funding_tdc_vehicles = request('funding_tdc_vehicles');

        $project->funding_federal_vehicles_total = request('funding_federal_vehicles_total') == '----' ? null : request('funding_federal_vehicles_total');
        $project->funding_local_vehicles_total = request('funding_local_vehicles_total') == '----' ? null : request('funding_local_vehicles_total');
        $project->funding_local_beyond_vehicles_total = request('funding_local_beyond_vehicles_total') == '----' ? null : request('funding_local_beyond_vehicles_total');
        $project->funding_total_vehicles_total = request('funding_total_vehicles_total') == '----' ? null : request('funding_total_vehicles_total');
        $project->funding_tdc_vehicles_total = request('funding_tdc_vehicles_total') == '----' ? null : request('funding_tdc_vehicles_total');
        $project->yoe_cost_bus = request('yoe_cost_bus') == '----' ? null : request('yoe_cost_bus');
        $project->funding_category_bus = request('funding_category_bus');
        $project->funding_federal_bus = request('funding_federal_bus');
        $project->funding_local_bus = request('funding_local_bus');
        $project->funding_local_beyond_bus = request('funding_local_beyond_bus');
        $project->funding_total_bus = request('funding_total_bus');
        $project->funding_tdc_bus = request('funding_tdc_vehicles');
        $project->funding_federal_bus_total = request('funding_federal_bus_total') == '----' ? null : request('funding_federal_bus_total');
        $project->funding_local_bus_total = request('funding_local_bus_total') == '----' ? null : request('funding_local_bus_total');
        $project->funding_local_beyond_bus_total = request('funding_local_beyond_bus_total') == '----' ? null : request('funding_local_beyond_bus_total');
        $project->funding_total_bus_total = request('funding_total_bus_total') == '----' ? null : request('funding_total_bus_total');
        $project->funding_tdc_bus_total = request('funding_tdc_bus_total') == '----' ? null : request('funding_tdc_bus_total');
        $project->yoe_cost_operations = request('yoe_cost_operations') == '----' ? null : request('yoe_cost_operations');
        $project->funding_category_operations = request('funding_category_operations');
        $project->funding_federal_operations = request('funding_federal_operations');
        $project->funding_local_operations = request('funding_local_operations');
        $project->funding_local_beyond_operations = request('funding_local_beyond_operations');
        $project->funding_total_operations = request('funding_total_operations');
        $project->funding_federal_operations_total = request('funding_federal_operations_total') == '----' ? null : request('funding_federal_operations_total');
        $project->funding_local_operations_total = request('funding_local_operations_total') == '----' ? null : request('funding_local_operations_total');
        $project->funding_local_beyond_operations_total = request('funding_local_beyond_operations_total') == '----' ? null : request('funding_local_beyond_operations_total');
        $project->funding_total_operations_total = request('funding_total_operations_total') == '----' ? null : request('funding_total_operations_total');
        $project->local_pm_name = request('local_pm_name');
        $project->local_pm_phone = request('local_pm_phone');
        $project->local_pm_email = request('local_pm_email');
        $project->local_pm_agency = request('local_pm_agency');
        $project->local_pm_title = request('local_pm_title');
        $project->state_pm_name = request('state_pm_name');
        $project->state_pm_phone = request('state_pm_phone');
        $project->state_pm_email = request('state_pm_email');
        $project->state_pm_agency = request('state_pm_agency');
        $project->state_pm_title = request('state_pm_title');
        $project->sponsor_name = request('sponsor_name');
        $project->sponsor_phone = request('sponsor_phone');
        $project->sponsor_email = request('sponsor_email');
        $project->sponsor_agency = request('sponsor_agency');
        $project->sponsor_title = request('sponsor_title');
        $project->sponsor = request('sponsor');
        $project->contact_name = request('contact_name');
        $project->contact_phone = request('contact_phone');
        $project->contact_email = request('contact_email');
        $project->contact_agency = request('contact_agency');
        $project->contact_title = request('contact_title');
        $project->signature = request('signature');
        $project->comments = request('comments');

        $project->pavement_good_condition = request('pavement_good_condition');
        $project->pavement_fair_condition = request('pavement_fair_condition');
        $project->pavement_poor_condition = request('pavement_poor_condition');
        $project->total_crash_EP = request('total_crash_EP');
        $project->fatal_crash_EP = request('fatal_crash_EP');
        $project->injury_crash_EP = request('injury_crash_EP');
        $project->pedestrian_crash_EP = request('pedestrian_crash_EP');
        $project->total_crash_DA = request('total_crash_DA');
        $project->fatal_crash_DA = request('fatal_crash_DA');
        $project->injury_crash_DA = request('injury_crash_DA');
        $project->pedestrian_crash_DA = request('pedestrian_crash_DA');
        $project->good_bridges = request('good_bridges');
        $project->fair_bridges = request('fair_bridges');
        $project->poor_bridges = request('poor_bridges');
        $project->good_area = request('good_area');
        $project->fair_area = request('fair_area');
        $project->poor_area = request('poor_area');

        $project->points = request('points');

        $project->save();

        if ($project->project_type == "TASA") {
            return view('projects.edit', compact('project'));
        } else {
            return view('projects/5310.edit2', compact('project'));
        }
    }
    /*
        Here we are filtering all the projects on the database
        we filter so we send the past submitted project only
     */
    /*
        Here we are filtering all the projects on the database
        we filter so we send the past submitted project only
     */
    public function getLogOfChangesArray($projectReceived)
    {
        //projectReceived is the current project instance
        $projects = Project::all(); //store all projects
        error_log(count($projects));
        $attributesOfProjects = [];
        $logOfChanges = [];
        $currentProject = [];
        $oldestProject = 0;
        $hasMoreVersions = false;

        // gets prev project
        foreach ($projects as $projectHolder) {
            //filters all projects with same parent ID and projects older than current project
            if ($projectReceived->id != $projectHolder->id && $projectHolder->status == 2) { //not same project and status = 1 since its a submission
                if ($projectReceived->parent_id == null && $projectReceived->id  == $projectHolder->parent_id || ($projectReceived->parent_id != null && $projectReceived->parent_id  == $projectHolder->parent_id) || ($projectReceived->parent_id != null && $projectReceived->parent_id  == $projectHolder->id)) {
                    if (strtotime($projectReceived->created_at) > strtotime($projectHolder->created_at)) { // if current project is newer than the project being iterated (project holder)
                        //gets oldest project id
                        if ($oldestProject < $projectHolder->id) {
                            $hasMoreVersions = true;
                            unset($attributesOfProjects); //reset
                            $attributesOfProjects = [];
                            array_push($attributesOfProjects, $projectHolder->attributesToArray());
                            $oldestProject = $projectHolder->id;
                        }
                    }
                }
            }
        }

        array_push($currentProject, $projectReceived->attributesToArray()); //convert format of current Project
        error_log(count($attributesOfProjects));
        //push
        if ($hasMoreVersions) {
            // iterates each column of table and stores only the ones that contain a change
            foreach ($attributesOfProjects[0] as $key => $value) {
                if ($attributesOfProjects[0][$key] != $currentProject[0][$key]) {
                    //$logOfChanges[$key] = ("Difference in: ".$key." old Value is: ".$attributesOfProjects[0][$key]);
                    $logOfChanges[$key] = $attributesOfProjects[0][$key];
                }
            }
        }
        return  $logOfChanges;
    }
    //if we need more info we could find it here and store it in an array that will be send to the front end
    public function infoCurrentProject($currentProject)
    {
        $infoCurrentProject = array(
            "currentSubmission" => 1, //true
        );

        $projects = Project::all(); //store all projects
        foreach ($projects as $iterator) {
            if ($iterator->parent_id == $currentProject->parent_id) {
                // if project being iterated has a newer id than the current project's id 
                // that means there are more submissions
                if($iterator->id > $currentProject->id ){
                    $infoCurrentProject["currentSubmission"] = 0; //false
                }
            }
        }
        return $infoCurrentProject;
    }
    public function show(Project $project)
    {
        $logOfChanges = array();
        $logOfChanges =  $this->getLogOfChangesArray($project);
        $infoCurrentProject = array();
        $infoCurrentProject =  $this->infoCurrentProject($project); // get if current project is latest submission

        if ($project->project_type == "TASA") {
            return view('projects.show', compact('project', 'logOfChanges', 'infoCurrentProject'));
        } else {
            return view('projects/5310.show2', compact('project', 'logOfChanges', 'infoCurrentProject'));
        }
    }

    /*
    public function show_Comment(Project $project)
    {
        
        $projects = Project::all(); //Project::where('mpo_id', $project->mpo_id)->get();
        error_log(count($projects));
        $attributesOfProjects = [];
        $logOfChanges = [];
        $currentProject = [];
        $oldestProject = 0;
        $hasMoreVersions = false;

        // gets prev project
        foreach ($projects as $projectHolder) {
            //filters all projects with same parent ID and projects older than current project
            if ($project->id != $projectHolder->id) { //not same project
                if ($project->parent_id == null && $project->id  == $projectHolder->parent_id || ($project->parent_id != null && $project->parent_id  == $projectHolder->parent_id) || ($project->parent_id != null && $project->parent_id  == $projectHolder->id)) {
                    if (strtotime($project->created_at) > strtotime($projectHolder->created_at)) {
                        if ($oldestProject < $projectHolder->id) {
                            $hasMoreVersions = true;
                            unset($attributesOfProjects); //reset
                            $attributesOfProjects = [];
                            array_push($attributesOfProjects, $projectHolder->attributesToArray());
                            $oldestProject = $projectHolder->id;
                            //  print_r($attributesOfProjects);
                        }
                    }
                }
            }
        }

        array_push($currentProject, $project->attributesToArray()); //convert format of current Project
        error_log(count($attributesOfProjects));
        //push
        if ($hasMoreVersions) {
            foreach ($attributesOfProjects[0] as $key => $value) {
                if ($attributesOfProjects[0][$key] != $currentProject[0][$key]) {
                    //$logOfChanges[$key] = ("Difference in: ".$key." old Value is: ".$attributesOfProjects[0][$key]);
                    $logOfChanges[$key] = $attributesOfProjects[0][$key];
                }
            }
        }

        return view('projects.show_Comment', compact('project', 'logOfChanges')); 
        return view('projects.show_Comment', compact('project'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if ($project->project_type == "TASA") {
            return view('projects.edit', compact('project'));
        } else {
            return view('projects/5310.edit2', compact('project'));
        }
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

        if (request('status') != $project->status && $project->status > 0) {
            $newProject = $project->replicate();
            $newProject->status = request('status');
            $newProject->parent_id = ($project->parent_id != null) ? $project->parent_id : $project->id;
            $newProject->author = auth()->user()->name;
            $newProject->save();
            return redirect(route('projects.index'));
        }


        request()->validate([
            'name' => 'required',
        ]);

        $project->project_type = request('project_type');
        $project->mpo_id = request('mpo_id');
        $project->csj_cn = request('csj_cn');
        $project->author = auth()->user()->name;
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
        $project->network_year = request('network_year') == '----' ? null : request('network_year');
        $project->type = request('type') == '----' ? null : request('type');
        $project->on_state = request('on_state') == 'on' ? true : false;
        $project->off_state = request('off_state') == 'on' ? true : false;
        $project->capacity_project = request('capacity_project') == 'on' ? true : false;
        $project->classification = request('classification') == '----' ? null : request('classification');
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
        $project->strategy_1 = request('strategy_1') == '----' ? null : request('strategy_1');
        $project->strategy_2 = request('strategy_2') == '----' ? null : request('strategy_2');
        $project->strategy_3 = request('strategy_3') == '----' ? null : request('strategy_3');
        $project->strategy_4 = request('strategy_4') == '----' ? null : request('strategy_4');
        $project->strategy_5 = request('strategy_5') == '----' ? null : request('strategy_5');
        $project->strategy_6 = request('strategy_6') == '----' ? null : request('strategy_6');
        $project->description_strategy_1 = request('description_strategy_1');
        $project->description_strategy_2 = request('description_strategy_2');
        $project->description_strategy_3 = request('description_strategy_3');
        $project->description_strategy_4 = request('description_strategy_4');
        $project->description_strategy_5 = request('description_strategy_5');
        $project->description_strategy_6 = request('description_strategy_6');
        $project->description_strategy_7 = request('description_strategy_7');
        $project->description_strategy_8 = request('description_strategy_8');
        $project->description_strategy_9 = request('description_strategy_9');
        $project->description_strategy_10 = request('description_strategy_10');
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
        $project->reviewed_dates = request('reviewed_dates');
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
        $project->fta_trans_start_date = request('fta_trans_start_date');
        $project->fta_trans_end_date = request('fta_trans_end_date');
        $project->fta_trans_progress = request('fta_trans_progress') == '----' ? null : request('fta_trans_progress');
        $project->fta_trans_agency = request('fta_trans_agency') == '----' ? null : request('fta_trans_agency');
        $project->fta_trans_comments = request('fta_trans_comments');
        $project->active_fta_start_date = request('active_fta_start_date');
        $project->active_fta_end_date = request('active_fta_end_date');
        $project->active_fta_progress = request('active_fta_progress') == '----' ? null : request('active_fta_progress');
        $project->active_fta_agency = request('active_fta_agency') == '----' ? null : request('active_fta_agency');
        $project->active_fta_comments = request('active_fta_comments');
        $project->bus_start_date = request('bus_start_date');
        $project->bus_end_date = request('bus_end_date');
        $project->bus_progress = request('bus_progress') == '----' ? null : request('bus_progress');
        $project->bus_agency = request('bus_agency') == '----' ? null : request('bus_agency');
        $project->bus_comments = request('bus_comments');
        $project->delivery_start_date = request('delivery_start_date');
        $project->delivery_end_date = request('delivery_end_date');
        $project->delivery_progress = request('delivery_progress') == '----' ? null : request('delivery_progress');
        $project->delivery_agency = request('delivery_agency') == '----' ? null : request('delivery_agency');
        $project->delivery_comments = request('delivery_comments');
        $project->other_start_date = request('other_start_date');
        $project->other_end_date = request('other_end_date');
        $project->other_progress = request('other_progress') == '----' ? null : request('other_progress');
        $project->other_agency = request('other_agency') == '----' ? null : request('other_agency');
        $project->other_comments = request('other_comments');
        $project->reviewed_yes = request('reviewed_yes') == 'on' ? 1 : null;
        $project->reviewed_no = request('reviewed_no') == 'on' ? 1 : null;
        $project->reviewed_na = request('reviewed_na') == 'on' ? 1 : null;
        $project->date_reviewed = request('date_reviewed');
        $project->fta_transfer = request('fta_transfer') == 'on' ? 1 : null;
        $project->capital = request('capital') == 'on' ? 1 : null;
        $project->operations = request('operations') == 'on' ? 1 : null;
        $project->c = request('c') == 'on' ? 1 : null;
        $project->nonc = request('nonc') == 'on' ? 1 : null;
        $project->pe = request('pe') == 'on' ? 1 : null;
        $project->env = request('env') == 'on' ? 1 : null;
        $project->eng = request('eng') == 'on' ? 1 : null;
        $project->r = request('r') == 'on' ? 1 : null;
        $project->acq = request('acq') == 'on' ? 1 : null;
        $project->utl = request('utl') == 'on' ? 1 : null;
        $project->subtotal_amount = request('subtotal_amount') == '----' ? null : request('subtotal_amount');
        $project->non_construction_amount = request('non_construction_amount') == '----' ? null : request('non_construction_amount');
        $project->construction_amount = request('construction_amount') == '----' ? null : request('construction_amount');
        $project->ce_amount = request('ce_amount') == '----' ? null : request('ce_amount');
        $project->contingencies_amount = request('contingencies_amount') == '----' ? null : request('contingencies_amount');
        $project->change_order_amount = request('change_order_amount') == '----' ? null : request('change_order_amount');
        $project->PE_amount = request('PE_amount') == '----' ? null : request('PE_amount');
        $project->indirects_amount = request('indirects_amount') == '----' ? null : request('indirects_amount');
        $project->ROW_amount = request('ROW_amount') == '----' ? null : request('ROW_amount');
        $project->transfer_amount = request('transfer_amount') == '----' ? null : request('transfer_amount');
        $project->total_amount = request('total_amount') == '----' ? null : request('total_amount');
        $project->costs_1 = request('costs_1') == '----' ? null : request('costs_1');
        $project->costs_2 = request('costs_2') == '----' ? null : request('costs_2');
        $project->costs_3 = request('costs_3') == '----' ? null : request('costs_3');
        $project->costs_4 = request('costs_4') == '----' ? null : request('costs_4');
        $project->mpo_funds = request('mpo_funds') == 'on' ? 1 : null;
        $project->yoe_cost = request('yoe_cost') == '----' ? null : request('yoe_cost');
        
        $project->funding_category = request('funding_category');
        $project->funding_federal = request('funding_federal');
        $project->funding_state = request('funding_state');
        $project->funding_local = request('funding_local');
        $project->funding_local_beyond = request('funding_local_beyond');
        $project->funding_total = request('funding_total');
        
        $project->funding_federal_result = request('funding_federal_result') == '----' ? null : request('funding_federal_result');
        $project->funding_state_result = request('funding_state_result') == '----' ? null : request('funding_state_result');
        $project->funding_local_result = request('funding_local_result') == '----' ? null : request('funding_local_result');
        $project->funding_local_beyond_result = request('funding_local_beyond_result') == '----' ? null : request('funding_local_beyond_result');
        $project->funding_total_result = request('funding_total_result') == '----' ? null : request('funding_total_result');
        $project->mpo_funds_2 = request('mpo_funds_2') == 'on' ? 1 : null;
        $project->yoe_cost_vehicles = request('yoe_cost_vehicles') == '----' ? null : request('yoe_cost_vehicles');

        $project->funding_category_vehicles = request('funding_category_vehicles');
        $project->funding_federal_vehicles = request('funding_federal_vehicles');
        $project->funding_local_vehicles = request('funding_local_vehicles');
        $project->funding_local_beyond_vehicles = request('funding_local_beyond_vehicles');
        $project->funding_total_vehicles = request('funding_total_vehicles');
        $project->funding_tdc_vehicles = request('funding_tdc_vehicles');

        $project->funding_federal_vehicles_total = request('funding_federal_vehicles_total') == '----' ? null : request('funding_federal_vehicles_total');
        $project->funding_local_vehicles_total = request('funding_local_vehicles_total') == '----' ? null : request('funding_local_vehicles_total');
        $project->funding_local_beyond_vehicles_total = request('funding_local_beyond_vehicles_total') == '----' ? null : request('funding_local_beyond_vehicles_total');
        $project->funding_total_vehicles_total = request('funding_total_vehicles_total') == '----' ? null : request('funding_total_vehicles_total');
        $project->funding_tdc_vehicles_total = request('funding_tdc_vehicles_total') == '----' ? null : request('funding_tdc_vehicles_total');
        $project->yoe_cost_bus = request('yoe_cost_bus') == '----' ? null : request('yoe_cost_bus');
        $project->funding_category_bus = request('funding_category_bus');
        $project->funding_federal_bus = request('funding_federal_bus');
        $project->funding_local_bus = request('funding_local_bus');
        $project->funding_local_beyond_bus = request('funding_local_beyond_bus');
        $project->funding_total_bus = request('funding_total_bus');
        $project->funding_tdc_bus = request('funding_tdc_vehicles');
        $project->funding_federal_bus_total = request('funding_federal_bus_total') == '----' ? null : request('funding_federal_bus_total');
        $project->funding_local_bus_total = request('funding_local_bus_total') == '----' ? null : request('funding_local_bus_total');
        $project->funding_local_beyond_bus_total = request('funding_local_beyond_bus_total') == '----' ? null : request('funding_local_beyond_bus_total');
        $project->funding_total_bus_total = request('funding_total_bus_total') == '----' ? null : request('funding_total_bus_total');
        $project->funding_tdc_bus_total = request('funding_tdc_bus_total') == '----' ? null : request('funding_tdc_bus_total');
        $project->yoe_cost_operations = request('yoe_cost_operations') == '----' ? null : request('yoe_cost_operations');
        $project->funding_category_operations = request('funding_category_operations');
        $project->funding_federal_operations = request('funding_federal_operations');
        $project->funding_local_operations = request('funding_local_operations');
        $project->funding_local_beyond_operations = request('funding_local_beyond_operations');
        $project->funding_total_operations = request('funding_total_operations');
        $project->funding_federal_operations_total = request('funding_federal_operations_total') == '----' ? null : request('funding_federal_operations_total');
        $project->funding_local_operations_total = request('funding_local_operations_total') == '----' ? null : request('funding_local_operations_total');
        $project->funding_local_beyond_operations_total = request('funding_local_beyond_operations_total') == '----' ? null : request('funding_local_beyond_operations_total');
        $project->funding_total_operations_total = request('funding_total_operations_total') == '----' ? null : request('funding_total_operations_total');
        $project->local_pm_name = request('local_pm_name');
        $project->local_pm_phone = request('local_pm_phone');
        $project->local_pm_email = request('local_pm_email');
        $project->local_pm_agency = request('local_pm_agency');
        $project->local_pm_title = request('local_pm_title');
        $project->state_pm_name = request('state_pm_name');
        $project->state_pm_phone = request('state_pm_phone');
        $project->state_pm_email = request('state_pm_email');
        $project->state_pm_agency = request('state_pm_agency');
        $project->state_pm_title = request('state_pm_title');
        $project->sponsor_name = request('sponsor_name');
        $project->sponsor_phone = request('sponsor_phone');
        $project->sponsor_email = request('sponsor_email');
        $project->sponsor_agency = request('sponsor_agency');
        $project->sponsor_title = request('sponsor_title');
        $project->sponsor = request('sponsor');
        $project->contact_name = request('contact_name');
        $project->contact_phone = request('contact_phone');
        $project->contact_email = request('contact_email');
        $project->contact_agency = request('contact_agency');
        $project->contact_title = request('contact_title');
        $project->signature = request('signature');
        $project->comments = request('comments');

        $project->pavement_good_condition = request('pavement_good_condition');
        $project->pavement_fair_condition = request('pavement_fair_condition');
        $project->pavement_poor_condition = request('pavement_poor_condition');
        $project->total_crash_EP = request('total_crash_EP');
        $project->fatal_crash_EP = request('fatal_crash_EP');
        $project->injury_crash_EP = request('injury_crash_EP');
        $project->pedestrian_crash_EP = request('pedestrian_crash_EP');
        $project->total_crash_DA = request('total_crash_DA');
        $project->fatal_crash_DA = request('fatal_crash_DA');
        $project->injury_crash_DA = request('injury_crash_DA');
        $project->pedestrian_crash_DA = request('pedestrian_crash_DA');
        $project->good_bridges = request('good_bridges');
        $project->fair_bridges = request('fair_bridges');
        $project->poor_bridges = request('poor_bridges');
        $project->good_area = request('good_area');
        $project->fair_area = request('fair_area');
        $project->poor_area = request('poor_area');

        $project->points = request('points');

        if ($project->status != request('status')) {
            $newProject = $project->replicate();
            $newProject->status = request('status');
            $newProject->parent_id = ($project->parent_id != null) ? $project->parent_id : $project->id;
            $newProject->save();
        } else {
            $project->save();
        }

        if ($project->project_type == "TASA") {
            return view('projects.edit', compact('project'));
        } else {
            return view('projects/5310.edit2', compact('project'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Responses
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('projects.index'));
    }


    /**
     * Update the specified resource MPO ID in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    /*
    public function updateMPO(Request $request, Project $project)
    {
        $project->mpo_id = request('mpo_id');
        $project->csj_cn = request('csj_cn');
        $project->name = request('name');
        $project->save();

        return redirect(route('projects.index'));
    }
    */

    public function editInfo(Request $request, Project $project)
    {
        $project->mpo_id = request('mpo_id');
        $project->csj_cn = request('csj_cn');
        $project->save();

        return view('projects.editInfo', compact('project'));
    }

    public function comments(Request $request, Project $project)
    {
        $project->comments = request('comments');
        $project->save();

        return view('projects.comments',compact('project'));
    }

    /*
    public function show_Comment(Request $request, Project $project) {
        $project->comments_1 = request('comments_1');
        $project->comments_2 = request('comments_2');
        $project->comments_3 = request('comments_3');
        $project->comments_4 = request('comments_4');
        $project->comments_5 = request('comments_5');
        $project->comments_6 = request('comments_6');

        $project->save();

        return view('projects.show_Comment',compact('project'));
    }
    */
}
