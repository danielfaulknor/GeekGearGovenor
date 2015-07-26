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
    {!! Form::close() !!}
@stop
