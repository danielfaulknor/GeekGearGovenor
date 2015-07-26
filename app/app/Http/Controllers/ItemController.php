<?php

namespace GeekGearGovernor\Http\Controllers;

use Request;

use GeekGearGovernor\Http\Requests;
use GeekGearGovernor\Http\Controllers\Controller;

use GeekGearGovernor\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $items = Item::all();
      return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $item = Request::all();
      $item['barcode'] = str_pad($item['barcode'],5,"0",STR_PAD_LEFT);
      item::create($item);
      return redirect('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $item = Item::find($id);
      return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      $item = Item::find($id);
      return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $itemUpdate=Request::all();
      $itemUpdate['barcode'] = str_pad($itemUpdate['barcode'],5,"0",STR_PAD_LEFT);
      $item = Item::find($id);
      $item->update($itemUpdate);
      return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      Item::find($id)->delete();
      return redirect('items');
    }
}
