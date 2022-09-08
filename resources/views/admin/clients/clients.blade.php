@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Business Name</th>
                                                <th>Email</th>
                                                <th>Contact Number</th>
                                                <th>Status</th>
                                                <th>Register At</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($clients as $client)
                                                <tr class='clickable-row' data-href="{{ route('admin.client', ['user' => $client->user->id]) }}">
                                                    <td>
                                                        {{$client->user->personal_detail->name ?? ''}}
                                                        
                                                    </td>
                                                    <td>{{$client->user->business_detail->business_name ?? ''}}</td>
                                                    <td>{{$client->user->email ?? ''}}</td>
                                                    <td>{{$client->user->personal_detail->mobile_number ?? ''}}</td>
                                                    <td><span class="badge badge-warning">{{$client->user->status ?? ''}}</span></td>
                                                    <td class="date-txt">{{$client->user->created_at ?? ''}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    
                                                </th>
                                                <th>Name</th>
                                                <th>Business Name</th>
                                                <th>Email</th>
                                                <th>Contact Number</th>
                                                <th>Status</th>
                                                <th>Register At</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                            </div>
                        </div>
                    </div>

    
</div>
@endsection
