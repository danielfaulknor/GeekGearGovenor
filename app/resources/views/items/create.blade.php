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
@stop
