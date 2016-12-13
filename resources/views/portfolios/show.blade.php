<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $portfolio->user->name }} {{ $portfolio->user->infix }} {{ $portfolio->user->surname }} </title>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{{ asset('/css/style.css') }}}" rel="stylesheet">
    <style type="text/css">
        body{
            background: {{ $portfolio->background_color }};
            color: {{ $portfolio->text_color }};
        }    

        h1, h2, h3, h4, h5, h6{
            color: {{ $portfolio->headers_color }};
        }
    </style>
</head>
<body>

    @php 
        // Voorkomt dat gasten, docenten en SLB'ers het portfolio aan kunnen passen
        $portfolioOwner = !Auth::guest() && Auth::user()->user_level > 1;
        // $portfolioOwner = True;
        $teacher = !Auth::guest() && Auth::user()->user_level < 2;
    @endphp
    @include('layouts.nav')
    <div class="container">
        <h1> 
            Portfolio van {{ $portfolio->user->name }} {{ $portfolio->user->infix }} {{ $portfolio->user->surname }} 
            @if($portfolioOwner)
                <div class="btn-group pull-right">
                    <a class="btn btn-default"  role="button"> <em> Geen cijfer </em> </a>
                    <a class="btn btn-default" href="{{ url('modules/create') }}" role="button">Module toevoegen</a>
                    <a class="btn btn-default " href="{{ url('portfolios/' . $portfolio->id . '/edit') }}" role="button">
                        Instellingen
                    </a>
                </div>

            @endif
        </h1>  
        <hr>
        @foreach($portfolio->modules as $module)
            @if((Auth::guest() && $module->approved) || !Auth::guest())
                @php
                    $grade = empty($module->grade) ? "<em> Geen cijfer </em>" : $module->grade;
                    $approved = $module->approved ? 'Goedgekeurd' : 'Niet goedgekeurd';
                @endphp

                @if($module->type == 0)
                    <div>
                        <h3> 
                            {{$module->title}}
                            @if($portfolioOwner)
                                <div class="btn-group pull-right">
                                    <a class="btn btn-default" role="button"> {!! $grade !!} </a>
                                    <a class="btn btn-default" role="button">{!! $approved !!}</a>
                                    <a class="btn btn-default" href="{{ url('modules/' . $module->id) }}" role="button">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                    <a class="btn btn-default" href="{{ url('modules/' . $module->id . '/edit') }}" role="button">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/modules', $module->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    <button onclick="return confirm('Confirm delete?')" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                    {!! Form::close() !!}
                                </div>
                            @endif

                            @if($teacher)
                                <div class="btn-group  pull-right">
                                    <a class="btn btn-default" id="grade"  data-grade="{{$module->grade}}" data-id="{{$module->id}}" role="button">  {!! $grade !!} </a>
                                    <a class="btn btn-default" id="approved" onclick="approve({{$module->id}})"  role="button">{!! $approved !!}</a>
                                </div>
                            @endif
                        </h3>
                        <p > {!!$module->description!!} </p>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@if($teacher)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>


        function approve(id){
            $.ajax({
                url:"{{ url('modules/') }}" + "/" + id + "/approve",
                type:'POST',
                headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                success: function(data){
                    if (data == 1) {
                        $('#approved').html('Goedgekeurd');
                    } else{
                        $('#approved').html('Niet goedgekeurd');
                    }
                }
            });
        }

        function grade(id,grade = ""){
            $('#grade').replaceWith('<input type="text" id="grade_input" class="btn btn-default">');
            $('#grade_input').focus();
            $('#grade_input').focusout(function() {
                var grade = $('#grade_input').val();

                if (grade == "" || !$.isNumeric(grade)) {
                    grade = "null";
                    $.ajax({
                        url:"{{ url('modules/') }}" + "/" + id + "/grade",
                        type:'POST',
                        headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                        data: {grade: grade},
                        success: function(data){
                            $('#grade_input').replaceWith('<a class="btn btn-default" data-id="'+ id +'" data-grade="' + grade + '" id="grade" role="button"><em>Geen cijfer</em></a>');
                        }
                    });
                } else {
                    $.ajax({
                        url:"{{ url('modules/') }}" + "/" + id + "/grade",
                        type:'POST',
                        headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                        data: {grade: grade},
                        success: function(data){
                            $('#grade_input').replaceWith('<a class="btn btn-default" data-id="'+ id +'" data-grade="' + grade + '" id="grade" role="button">' + grade + '</a>');
                        }
                    });   
                }
            })
        }

        $(document).on('click',"#grade", function(event) {
            grade($(this).data('id'),$(this).data('grade'));
        });
    </script>
@endif
</body>
</html>