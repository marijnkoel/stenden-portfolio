@extends('layouts.app')

@section('content')
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
    </div>
@endsection