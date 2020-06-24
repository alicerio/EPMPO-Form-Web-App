<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    // Casts array into json.
    protected $casts = [
        'points' => 'array'
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
