@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Module_portfolios</div>
                    <div class="panel-body">

                        <a href="{{ url('/module_portfolios/create') }}" class="btn btn-primary btn-xs" title="Add New Module_portfolio"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Portfolio Id </th><th> Module Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($module_portfolios as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->portfolio_id }}</td><td>{{ $item->module_id }}</td>
                                        <td>
                                            <a href="{{ url('/module_portfolios/' . $item->id) }}" class="btn btn-success btn-xs" title="View Module_portfolio"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/module_portfolios/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Module_portfolio"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/module_portfolios', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Module_portfolio" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Module_portfolio',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $module_portfolios->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection