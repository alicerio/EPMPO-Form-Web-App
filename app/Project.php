<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    // Casts array into json.
    protected $casts = [
        'points' => 'array',
        'funding_category' => 'array',
        'funding_federal' => 'array',
        'funding_state' => 'array',
        'funding_local' => 'array',
        'funding_local_beyond' => 'array',
        'funding_total' => 'array',
        'funding_category_vehicles' => 'array',
        'funding_federal_vehicles' => 'array',
        'funding_local_vehicles' => 'array',
        'funding_local_beyond_vehicles' => 'array',
        'funding_total_vehicles' => 'array',
        'funding_tdc_vehicles' => 'array',
        'funding_category_bus' => 'array',
        'funding_federal_bus' => 'array',
        'funding_local_bus' => 'array',
        'funding_local_beyond_bus' => 'array',
        'funding_total_bus' => 'array',
        'funding_tdc_bus' => 'array',
        'funding_category_operations' => 'array',
        'funding_federal_operations' => 'array',
        'funding_local_operations' => 'array',
        'funding_local_beyond_operations' => 'array',
        'funding_total_operations' => 'array'
    ];

    /**
     * Gathers all of the table columns from the database.
     */
    public function getTableColumns() {
        $qry = "SELECT column_name
            FROM information_schema.columns
            WHERE table_name = 'projects'      # Do not edit this line.
            AND table_schema = 'mpo_forms'";   # Name of database. Change if necessary.
        $result = DB::select($qry);
        $result = $this->transposeData($result);
        return $result;
    }

    /**
     * Parses the data from the database into a format that can be downloadable.
     */
    public function transposeData($data) {
        $result = array();
        foreach($data as $row => $columns){
            foreach($columns as $row2 => $column2){
                $result[$row2][$row] = $column2;
            }
        }
        return $result;
    }

    /**
     * Gets the information of all of the projects.
     */
    public function getAll(){
        return collect(DB::select('select * from'.$this->getTable()));
    }

    /**
     * Gets the information of a specific project in order to download it to excel.
     */
    public function getProject($id) {
        return collect(DB::select('select * from '.$this->getTable(). ' where id = '.  $id));
    }
}
