@extends('layouts.base')

@section('title')
    Portfolios
@endsection

@section('content')
    <div class="container">
    <h3> Portfolios </h3>
            @foreach($portfolios as $portfolio)
            <div class="col-md-3 background_color">
               <div class="flex-center">
                 <h4>{{$portfolio->user->name}} {{$portfolio->user->infix}} {{$portfolio->user->surname}}</h4><br>
               </div>
               <div class="flex-center">
                 Naam: {{$portfolio->user->name}}<br>
                 Achternaam: {{$portfolio->user->infix}} {{$portfolio->user->surname}}<br>
                 Email: {{$portfolio->user->email}}<br>
                 
               </div>
               <div class="flex-center">
                 <a href="{{ url('portfolios/' . $portfolio->id) }}" class="btn btn-portfolio">Bekijk portfolio</a>
               </div>
              </div>
            @endforeach

{{--
                        <a href="{{ url('/portfolios/create') }}" class="btn btn-primary btn-xs" title="Add New Portfolio"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Student </th><th> Background Color </th><th> Headers Color </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($portfolios as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        @if(empty($item->user))
                                            <td><em> Geen </em></td>
                                        @else
                                            <td>{{ $item->user->name }} {{ $item->user->infix }} {{ $item->user->surname }}</td>
                                        @endif
                                        <td>{{ $item->background_color }}</td><td>{{ $item->headers_color }}</td>
                                        <td>
                                            <a href="{{ url('/portfolios/' . $item->id) }}" class="btn btn-success btn-xs" title="View Portfolio"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/portfolios/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Portfolio"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/portfolios', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Portfolio" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Portfolio',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> --}}
    <div class="pagination-wrapper"> {!! $portfolios->render() !!} </div>
</div>
@endsection
