<?php

namespace GeekGearGovernor\Http\Controllers;

use Request;
use Input;
use Auth;

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
      // Check if user has sent a search query
      if($query = Input::get('query', false)) {
        // Use the Elasticquent search method to search ElasticSearch
        $items = Item::search($query);
        if (!Auth::check()) {
            foreach ($items as $key => $item) {
                if ($item['public'] == 0) { unset($items[$key]); }
            }
        }
      } else {
        if (!Auth::check()) {
            // Get public items
            $items = Item::where('public', 1)->get();
        } else {
            // Show all items if no query is set
            $items = Item::all();
        }
      }

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
      $itemCreated = item::create($item);
      $itemCreated->addToIndex();
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
      $item->reIndex();
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
