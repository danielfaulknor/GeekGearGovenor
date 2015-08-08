<?php

namespace GeekGearGovernor\Classes;

class Tools {

    public static function outputTags($tags){
        $tagfield = '<input type="text" value="';
        $tagfield .= implode(",", $tags);
        $tagfield .= '"placeholder="Add tags.." />';
        echo $tagfield;
    }


}
