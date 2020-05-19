@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Agency</th>
                    <th scope="col">Type</th>
                    <!-- <th scope="col">Edit</th> 
                    <th scope="col">Delete</th>     previous version -->
                    <th scope="col">Edit options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->agency->name  }}</td>
                        <td>{{ $types[$user->type] }}</td>
                        <!-- Previous version
                        <td>
                          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                          <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger btn-block" type="submit">
                                  Delete
                              </button>
                          </form>
                        </td> -->

                           <!-- TO DO:  Add delete Logic  -->
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="user_edit_options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu" aria-labelledby="user_edit_options">
                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}" >Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              New User
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="agency" class="col-md-4 col-form-label text-md-right">{{ __('Agency') }}</label>

                    <div class="col-md-6">
                        <select name="agency_id" class="form-control @error('agency') is-invalid @enderror" required>
                            @foreach ($agencies as $agency)
                                <option value="{{ $agency->id }}">
                                    {{$agency->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('agency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                  <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                  <div class="col-md-6">
                      <select name="type" class="form-control @error('type') is-invalid @enderror" required>
                        <option value="0">Creator</option>
                        <option value="1">Submitter</option>
                        <option value="2">Admin</option>
                      </select>

                      @error('agency')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
