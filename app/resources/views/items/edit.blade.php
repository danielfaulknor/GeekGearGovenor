@inject('tools', 'GeekGearGovernor\Classes\Tools')
@extends('template')
@section('content')
    <h1>Update Item</h1>
    {!! Form::model($item,['method' => 'PATCH','route'=>['items.update',$item->id]]) !!}
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
    <div class="form-group">
        {!! Form::label('URL', 'URL:') !!}
        {!! Form::text('url',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group" id="taginputdiv">
      {!! Form::label('Tags', 'Tags:') !!}
      {!! $tools->outputTags($item->tagNames()); !!}
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
        {!! Form::checkbox('public',1,true,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    <input type="hidden" id="itemid" value="{{ @$item->id }}">
    {!! Form::close() !!}
    <script>
    $(document).ready(function()  {

	$('input').on('itemAdded', function(e) {
		tags =  $(this).val();
		updateTags(tags);
	});

	$('input').on('itemRemoved', function(e) {
		tags =  $(this).val();
		updateTags(tags);
	});


    function updateTags(tags){
	url = '/itemTags/editTags';
	id = $("#itemid").val();

	var posting = $.post (url, {tagData: tags, id: id} );

    }

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
@endsection
