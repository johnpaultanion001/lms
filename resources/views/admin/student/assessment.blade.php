
@extends('layouts.student')
@section('sub-title','ASSESSMENT')

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
   
</style>
<section class="py-5 mt-3">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <h3 class="m-3">Freshmen Assessment</h3>
                    <p class="m-3">
                    PRIVACY POLICY: <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus. 
                    <br><br>
                    DIRECTIONS: <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus.  
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo tortor, aliquam vel auctor eget, consequat sed mi. Quisque varius urna ac hendrerit gravida. Nam ut consectetur libero. Donec non leo eu nulla vestibulum cursus. 

                    </p>
                    <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.student.assessment.store') }}">
                        @csrf
                        @foreach($categories as $category)
                            <div class="card mb-3">
                                <div class="card-header">{{ $category->name }}</div>
                
                                <div class="card-body">
                                    @foreach($category->categoryQuestions as $question)
                                        <div class="card @if(!$loop->last)mb-3 @endif">
                                            <div class="card-header">{{ $question->question_text }}</div>
                        
                                            <div class="card-body">
                                                <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                @foreach($question->questionOptions as $option)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
                                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                                            {{ $option->option_text }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                                @if($errors->has("questions.$question->id"))
                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-lg btn-wd text-uppercase">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
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