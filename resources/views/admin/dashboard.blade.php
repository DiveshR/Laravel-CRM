@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>

            <div class="card">
                <div class="card-header">{{ __('Latest 5 Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Register at</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->created_at->format('d,M Y') }}</td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                      </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Latest 5 Records') }}</div>
                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Full Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col">city</th>
                              <th scope="col">state</th>
                              <th scope="col">Created at</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($records as $record)
                            <tr>
                              <td>{{ $record->first_name }} {{ $record->last_name }}</td>
                              <td>{{ $record->email }}</td>
                              <td>{{ $record->phone_number }}</td>
                              <td>{{ $record->city }}</td>
                              <td>{{ $record->state }}</td>
                              <td>{{ $record->created_at->format('d,M Y') }}</td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
