<?php

namespace GeekGearGovernor\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Response;

use GeekGearGovernor\Http\Requests;
use GeekGearGovernor\Http\Controllers\Controller;

class SearchController extends Controller
{

    public function query()
    {

        switch(Input::get('type')) {
            case "tags":
                $query = Input::get('query');
                if ($query) {
                  $taglistreturned = \Conner\Tagging\Tag::where('name', 'LIKE', '%'.$query.'%')->get();
                }
                else {
                  $taglistreturned = \Conner\Tagging\Tag::get();
                }
                foreach($taglistreturned as $tag) {
                   $tags[] = array("name" => $tag['attributes']['name']);
                }
                if (is_array($tags)) { return Response::json($tags); }
                break;
        }

    }

}
