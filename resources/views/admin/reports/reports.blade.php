@extends('layouts.admin')
@section('styles')
<style>
    .modal-content .modal-footer {
        border-top: none;
        padding-right: 24px;
        padding-bottom: 16px;
        padding-left: 24px;
        -webkit-justify-content: space-between;
        /* Safari 6.1+ */
        justify-content: space-between;
    }
    .select2{
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .select2-container--default .select2-selection--single {
        border: 0px solid #aaa !important;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">All Reports</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Report By</th>
                            <th>Platform</th>
                            <th>Description</th>
                            <th>Product ID</th>
                            <th>Report Seller</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Marketplace</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Marketplace</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Marketplace</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Marketplace</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Facebook</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Marketplace</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Marketplace</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>John paul Tanion</td>
                            <td>Shoppe</td>
                            <td>The establishment of the GrainCorp as a grain Elevators Board during the time of change a bulk grain terminal that had been proposed to Sydney at the turn of the century when the workers wer...</td>
                            <td>PROD4411952</td>
                            <td>Johnpaul</td>
                            <td>Sep 08,2022 12:31 PM</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Report ID</th>
                            <th>Report By</th>
                            <th>Platform</th>
                            <th>Description</th>
                            <th>Report Product</th>
                            <th>Report Seller</th>
                            <th>Created At</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
 
});
</script>
@endsection