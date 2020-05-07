<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Limit From</th>
                <th>Limit to</th>
                <th>Relationship Description</th>
                <th>Need Purpose</th>
                <th>Fiscal Year</th>
                <th>Network Year</th>
                <th>Highway/Roadway Name</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->limit_from}}</td>
                <td>{{$project->limit_to}}</td>
                <td>{{$project->relationship_description}}</td>
                <td>{{$project->need_purpose}}</td>
                <td>{{$project->fiscal_year}}</td>
                <td>{{$project->network_year}}</td>
                <td>{{$project->hwrw_name}}</td>
                <td>{{$project->type}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>