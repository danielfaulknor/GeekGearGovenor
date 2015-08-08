@extends('template')

@section('content')
 <h1>Items</h1>
 @if (Auth::check())
 <a href="{{url('/items/create')}}" class="btn btn-success">Create Item</a>
 @endif
 <hr>
 {!! Form::open(['method' => 'get']) !!}

  {!! Form::input('search', 'query', Input::get('query', '')) !!}
  {!! Form::submit('Filter results') !!}
  {!! link_to_action('ItemController@index', $title = "Clear", $parameters = array(), $attributes = array()) !!}
{!! Form:: close() !!}
<br />
{!! Form::open(['method' => 'get']) !!}

 {!! Form::input('search', 'tagquery', Input::get('tagquery', '')) !!}
 {!! Form::submit('Filter by tag') !!}
 {!! link_to_action('ItemController@index', $title = "Clear", $parameters = array(), $attributes = array()) !!}
{!! Form:: close() !!}
<hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Barcode</th>
         <th>Title</th>
         <th>Description</th>
         <th>Tags</th>
         <th>Missing Parts</th>
         @if (Auth::check() && Auth::user()->can('view-serials'))
         <th>Serial Number</th>
         @endif
         <th>Quantity</th>
         <th>Value</th>
         <th>New</th>
         <th>For Sale</th>
         <th>Public</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
      @foreach ($items as $item)
            <tr>
                <td>{{ $item->barcode }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->tagslist }}</td>
                <td>{{ $item->missing_parts }}</td>
                @if (Auth::check() && Auth::user()->can('view-serials'))
                <td>{{ $item->serial }}</td>
                @endif
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->new ? 'Yes' : 'No' }}</td>
                <td>{{ $item->sale ? 'Yes' : 'No' }}</td>
                <td>{{ $item->public ? 'Yes' : 'No' }}</td>
                <td><a href="{{url('items',$item->id)}}" class="btn btn-primary">View</a></td>
                @if (Auth::check())
                <td><a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                  {!! Form::open(['method' => 'DELETE', 'route'=>['items.destroy', $item->id]]) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                </td>
                @endif
              </tr>
          @endforeach
     </tbody>

 </table>
@endsection
