@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('agencies.create') }}" class="btn btn-primary mb-1 float-right">
                New Agency
            </a>
        </div>
        <div style="padding-top: 5%;"></div>
        <div class="col-2"></div>
        <div class="col-md-8">
            @if(count($agencies) == 0)
                <div class="alert alert-secondary text-center" role="alert">
                    No agencies have been submitted
              </div>
            @else
                <table class="table table-bordered text-center  table-hover">
                    <thead class = "thead-light">
                        <tr>
                            <th class ="col-md-10"scope="col">Name</th>
                            {{-- <th scope="col">Edit</th> --}}
                            <th class ="col-md-2" scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agencies as $agency)
                        <tr>
                            <td>
                                {{ $agency->name }}
                            </td>
                            <td>
                                <form action="{{ route('agencies.destroy', $agency->id) }}" method="POST" href="edit.php?id=1" onclick="return  confirm('Delete Agency?')"> 
                                    @csrf
                                    @method('delete')
                                    <button id = "deleteAgency"  class="btn btn-danger btn-block" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection
