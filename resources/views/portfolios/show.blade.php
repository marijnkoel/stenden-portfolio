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

        @if(Auth::guest())
            .navbar2{
                display: none;
            }
        @endif
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
        @php
            $portfolioGrade = empty($portfolio->grade) ? "<em> Geen cijfer </em>" : $portfolio->grade;
        @endphp
        <h1>
            Portfolio van {{ $portfolio->user->name }} {{ $portfolio->user->infix }} {{ $portfolio->user->surname }}
            @if($portfolioOwner)
                <div class="btn-group pull-right">
                    <a class="grade btn btn-default"  role="button"> {!! $portfolioGrade !!} </a>
                    <a class="btn btn-default" href="{{ url('modules/create') }}" role="button">Module toevoegen</a>
                    <a class="btn btn-default " href="{{ url('portfolios/' . $portfolio->id . '/edit') }}" role="button">
                        Instellingen
                    </a>
                </div>
            @endif

            @if($teacher)
                <div class="btn-group pull-right">
                    <a class="grade btn btn-default" id="portfolio-grade" data-id="{{$portfolio->id}}" data-grade="{{$portfolio->grade}}"  role="button"> {!! $portfolioGrade !!} </a>
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
                                    <a class="btn btn-default grade" role="button"> {!! $grade !!} </a>
                                    <a class="btn btn-default approved" role="button">{!! $approved !!}</a>
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
                                    <a class="btn btn-default grade" id="grade"  data-grade="{{$module->grade}}" data-id="{{$module->id}}" role="button">  {!! $grade !!} </a>
                                    <a class="btn btn-default approved" id="approved" onclick="approve({{$module->id}}, this)"  role="button">{!! $approved !!}</a>
                                </div>
                            @endif
                        </h3>
                        <p > {!!$module->description!!} </p>
                    </div>
                    <hr>
                @elseif($module->type == 1)
                    <div>
                        <h3>
                            Bestand: {{$module->title}}
                            @if($portfolioOwner)
                                <div class="btn-group pull-right">
                                    <a class="btn btn-default grade" role="button"> {!! $grade !!} </a>
                                    <a class="btn btn-default approved" role="button">{!! $approved !!}</a>
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
                                    <a class="btn btn-default grade" id="grade"  data-grade="{{$module->grade}}" data-id="{{$module->id}}" role="button">  {!! $grade !!} </a>
                                    <a class="btn btn-default approved" id="approved" onclick="approve({{$module->id}}, this)"  role="button">{!! $approved !!}</a>
                                </div>
                            @endif
                        </h3>
                        <p>
                            <a class="btn btn-default" href="{{ url($module->path) }}" role="button">Download bestand</a>
                        </p>
                    </div>
                    <hr>
                @elseif($module->type == 2)
                    <div>
                        <h3>
                            {{$module->title}}
                            <small> Klik om te bekijken </small>
                            @if($portfolioOwner)
                                <div class="btn-group pull-right">
                                    <a class="btn btn-default grade" role="button"> {!! $grade !!} </a>
                                    <a class="btn btn-default approved" role="button">{!! $approved !!}</a>
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
                                    <a class="btn btn-default grade" id="grade"  data-grade="{{$module->grade}}" data-id="{{$module->id}}" role="button">  {!! $grade !!} </a>
                                    <a class="btn btn-default approved" id="approved" onclick="approve({{$module->id}}, this)"  role="button">{!! $approved !!}</a>
                                </div>
                            @endif
                        </h3>
                        <p class="portfolio-image">
                            <a href="{{ url($module->path) }}"><img src="{{ url($module->path) }}"></a>
                        </p>
                    </div>
                    <hr>
                @elseif($module->type == 3)
                    <div>
                        <h3>
                            {{$module->title}}
                            @if($portfolioOwner)
                                <div class="btn-group pull-right">
                                    <a class="btn btn-default grade" role="button"> {!! $grade !!} </a>
                                    <a class="btn btn-default approved" role="button">{!! $approved !!}</a>
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
                                    <a class="btn btn-default grade" id="grade"  data-grade="{{$module->grade}}" data-id="{{$module->id}}" role="button">  {!! $grade !!} </a>
                                    <a class="btn btn-default approved" id="approved" onclick="approve({{$module->id}}, this)"  role="button">{!! $approved !!}</a>
                                </div>
                            @endif
                        </h3>
                        <p>
                            <video autobuffer autoloop loop controls>
                                <source src="{{ url($module->path) }}">
                            </video>
                        </p>
                    </div>
                    <hr>
                @endif
            @endif
        @endforeach

        <div id="comments">
        <h3>Reacties</h3>
            @foreach($portfolio->comments as $comment)
                <div class="comment">
                <p>
                    <strong> {{ $comment->user->name }} </strong>
                    {{ $comment->created_at }}
                </p>
                    <p>
                        {!! $comment->comment !!}
                    </p>
                </div>
            @endforeach

            @if($teacher)
                <div id="new-comment">
                    <form action="{{ url('portfolios/' . $portfolio->id . '/comment') }}" method="POST" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="textarea" class="control-label">Bericht</label>
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Plaatsen</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@if($teacher)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    <script>


        function approve(id, theElement){
            $.ajax({
                url:"{{ url('modules/') }}" + "/" + id + "/approve",
                type:'POST',
                headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                success: function(data){
                    if (data == 1) {
                        $(theElement).html('Goedgekeurd');
                    } else{
                        $(theElement).html('Niet goedgekeurd');
                    }
                }
            });
        }

        function grade(id,grade = "",theElement){
            $(theElement).replaceWith('<input type="text" id="grade_input" class="btn btn-default grade">');
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
                            $('#grade_input').replaceWith('<a class="btn btn-default grade" data-id="'+ id +'" data-grade="' + grade + '" id="grade" role="button"><em>Geen cijfer</em></a>');
                        }
                    });
                } else {
                    $.ajax({
                        url:"{{ url('modules/') }}" + "/" + id + "/grade",
                        type:'POST',
                        headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                        data: {grade: grade},
                        success: function(data){
                            $('#grade_input').replaceWith('<a class="grade btn btn-default" data-id="'+ id +'" data-grade="' + grade + '" id="grade" role="button">' + grade + '</a>');
                        }
                    });
                }
            })
        }

        $(document).on('click',"#grade", function(event) {
            grade($(this).data('id'),$(this).data('grade'), $(this));
        });
        $(document).on('click',"#portfolio-grade", function(event) {
            portfolioGrade($(this).data('id'),$(this).data('grade'));
        });

        function portfolioGrade(id,grade = ""){
            $('#portfolio-grade').replaceWith('<input type="text" id="grade_input_portfolio" class="btn btn-default grade">');
            $('#grade_input_portfolio').focus();

            $('#grade_input_portfolio').focusout(function() {
                var grade = $('#grade_input_portfolio').val();

                if (grade == "" || !$.isNumeric(grade)) {
                    grade = "null";
                    $.ajax({
                        url:"{{ url('modules/') }}" + "/" + id + "/gradeportfolio",
                        type:'POST',
                        headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                        data: {grade: grade},
                        success: function(data){
                            $('#grade_input').replaceWith('<a class="btn btn-default grade" data-id="'+ id +'" data-grade="' + grade + '" id="grade" role="button"><em>Geen cijfer</em></a>');
                        }
                    });
                } else {
                    $.ajax({
                        url:"{{ url('modules/') }}" + "/" + id + "/gradeportfolio",
                        type:'POST',
                        headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' },
                        data: {grade: grade},
                        success: function(data){
                            $('#grade_input').replaceWith('<a class="grade btn btn-default" data-id="'+ id +'" data-grade="' + grade + '" id="grade" role="button">' + grade + '</a>');
                        }
                    });
                }
            })
        }
    </script>
@endif
</body>
</html>
