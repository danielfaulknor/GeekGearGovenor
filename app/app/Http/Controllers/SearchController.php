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
                $query = Input::get('user');
                foreach(\Conner\Tagging\Tag::get() as $tag) {
                   $tags[] = array("name" => $tag['attributes']['name']);
                }
                return Response::json($tags);
                break;
        }

    }

}
