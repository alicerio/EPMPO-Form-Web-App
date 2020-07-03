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

    public function getTableColumns() {
        $qry = "SELECT column_name
            FROM information_schema.columns
            WHERE table_name = 'projects' # Do not edit this line.
            AND table_schema = 'test'";   # Name of database. Change if necessary.
        $result = DB::select($qry);
        $result = $this->transposeData($result);
        return $result;

    }

    public function transposeData($data) {
        $result = array();
        foreach($data as $row => $columns){
            foreach($columns as $row2 => $column2){
                $result[$row2][$row] = $column2;
            }
        }
        return $result;
    }

    public function getAll(){
        return collect(DB::select('select * from '.$this->getTable()));
    }
}
