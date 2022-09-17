@extends('layouts.student')
@section('sub-title','WELCOME')

@section('content')
<style>
    body{
        background-image: url('{{ asset('assets/img/bg.jpg') }}');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
    .bg-light {
        background: linear-gradient(180deg, #0e3ba0 0%, #2c2f7c 100%);
        background-color: transparent !important;
    }
    .dti_logo{
        position: absolute;
        width: 50px !important;
        height: 50px !important;
        object-fit: scale-down !important;
    }
</style>
<section class="search-header py-5 mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h1 class="m-0">WELCOME IT STUDENTS!</h1>
                    <h6 class="text-white mt-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus. Introduction about the assessment, about services of ITE department
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus. Introduction about the assessment, about services of ITE department
                    </h6>
                    @php
                        $already_take = App\Models\Result::where('user_id', auth()->user()->id)
                                                    ->where('year', auth()->user()->year)
                                                    ->first();
                    @endphp
                    @if($already_take == null)
                        <a href="/admin/student/assessment" class="btn btn-primary m-5">Take Assessment</a>
                    @elseif($already_take->end_time == null)
                        <a href="/admin/student/assessment" class="btn btn-primary m-5">Take Assessment</a>    
                    @else
                        <a href="/admin/student/results/{{$already_take->id}}" class="btn btn-secondary m-5 text-white">Already Completed Assessment</a>
                    @endif
                </div>
                
                
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
 <script>
      
</script>

@endsection