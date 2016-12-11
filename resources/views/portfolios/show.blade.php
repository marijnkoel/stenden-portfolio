{{-- 
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Portfolio {{ $portfolio->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('portfolios/' . $portfolio->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Portfolio"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['portfolios', $portfolio->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Portfolio',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $portfolio->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $portfolio->name }} </td></tr><tr><th> Background Color </th><td> {{ $portfolio->background_color }} </td></tr><tr><th> Headers Color </th><td> {{ $portfolio->headers_color }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

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
    @include('layouts.nav')
    <div class="container">
        <h1> Portfolio van {{ $portfolio->user->name }} {{ $portfolio->user->infix }} {{ $portfolio->user->surname }} </h1>  
    </div>
</body>
</html>