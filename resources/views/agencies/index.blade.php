@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('agencies.create') }}" class="btn btn-primary mb-1 float-right">
                New Agency
            </a>
        </div>
        <div class="col-md-12">
            @if(count($agencies) == 0)
                <div class="alert alert-secondary text-center" role="alert">
                    No agencies have been submitted
              </div>
            @else
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            {{-- <th scope="col">Edit</th> --}}
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agencies as $agency)
                        <tr>
                            <td>
                                {{-- <a href="{{ route('agencies.show', $agency->id) }}"> --}}
                                    {{ $agency->name }}
                                {{-- </a> --}}
                            </td>
                            {{-- <td>
                                <a href="{{ route('agencies.edit', $agency->id) }}" class="btn btn-primary btn-block">
                                    Edit
                                </a>
                            </td> --}}
                            <td>
                                <form action="{{ route('agencies.destroy', $agency->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-block" type="submit">
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
    </div>
</div>
@endsection
