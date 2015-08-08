@inject('tools', 'GeekGearGovernor\Classes\Tools')
@extends('template')
@section('content')
    <h1>Create Item</h1>
    {!! Form::open(['url' => 'items']) !!}
    <div class="form-group">
        {!! Form::label('Barcode', 'Barcode:') !!}
        {!! Form::text('barcode',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group" id="taginputdiv">
      {!! Form::label('Tags', 'Tags:') !!}
      <input type="text" placeholder="Add tags.." name="tags"/>
    </div>
    <div class="form-group">
        {!! Form::label('Missing Parts', 'Missing Parts:') !!}
        {!! Form::text('missing_parts',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Serial Number', 'Serial Number:') !!}
        {!! Form::text('serial',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Quantity', 'Quantity:') !!}
        {!! Form::text('quantity',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Value', 'Value:') !!}
        {!! Form::text('value',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('New', 'New:') !!}
        {!! Form::checkbox('new',1,false,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('For sale', 'For sale:') !!}
        {!! Form::checkbox('sale',1,false,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Public', 'Public:') !!}
        {!! Form::checkbox('public',1,false,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    <script>
    $(document).ready(function()  {

    var engine = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      remote: {
        url: '/query?type=tags&query=%QUERY',
        dataType: 'json',
      },
      prefetch: {
        url: '/query?type=tags',
        dataType: 'json',
      }

    });
    var promise = engine.initialize();

    promise
    .done(function() { console.log('ready to go!'); })
    .fail(function() { console.log('err, something went wrong :('); });

    $('#taginputdiv input').tagsinput({
      typeaheadjs: {
        displayKey: 'name',
        valueKey: 'name',
        source: engine.ttAdapter(),
        hint: true,
        highlight: true,
        minLength: 3,
        limit: 3
      }
    });

});



    </script>
@stop
