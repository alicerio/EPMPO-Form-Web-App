@extends('layouts.app')

@section('content')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
     
                <div class="dropdown">
                    <h2 class="float-right">
                        Status
                    </h2>
                </div>
     
        </div>
        <div style="padding-top: 5%;"></div>
        <div class="col-md-12">    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Tittle</th>
                        <th scope="col">Submitted</th>
                        <th scope="col">Document</th>
                        <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="admin_records_options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Options
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="admin_records_options">
                                        <a class="dropdown-item" >Approve</a>
                                        <a class="dropdown-item" href="#">Decline</a>
                                        <a class="dropdown-item" href="#">Add Comments</a>
                                        <a class="dropdown-item" href="#">Compare to Previous Version</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            
        </div>
    </div>
</div>
@endsection
