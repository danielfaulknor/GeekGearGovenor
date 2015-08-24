@extends('template')
@section('content')
    <h1>Item Detail</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="barcode" class="col-sm-2 control-label">Barcode</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="barcode" placeholder={{$item->barcode}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="title" placeholder="{{$item->title}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" placeholder="{{$item->description}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="url" class="col-sm-2 control-label">URL</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="url" placeholder="{{$item->url}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Tags</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tags" placeholder="{{$item->tagslist}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="missing_parts" class="col-sm-2 control-label">Missing Parts</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="missing_parts" placeholder="{{$item->missing_parts}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="serial" class="col-sm-2 control-label">Serial Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="serial" placeholder="{{$item->serial}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Quantity</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="quantity" placeholder={{$item->quantity}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="value" class="col-sm-2 control-label">Value</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="Value" placeholder={{$item->value}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">New</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="new" placeholder={{$item->new ? 'Yes' : 'No' }} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="sale" class="col-sm-2 control-label">For sale</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="sale" placeholder={{$item->sale ? 'Yes' : 'No' }} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="public" class="col-sm-2 control-label">Public</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="public" placeholder={{$item->public ? 'Yes' : 'No' }} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('items')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@endsection
