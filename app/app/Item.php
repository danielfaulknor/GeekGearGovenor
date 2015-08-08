<?php

namespace GeekGearGovernor;

use Elasticquent\ElasticquentTrait;

class Item extends \Illuminate\Database\Eloquent\Model
{
    use \Conner\Tagging\TaggableTrait;
    use ElasticquentTrait;

    protected $mappingProperties = array(
      'title' => [
        'type' => 'string',
        "analyzer" => "standard",
      ],
      'description' => [
        'type' => 'string',
        "analyzer" => "standard",
        ],
      );

    protected $fillable=[
      'barcode',
      'title',
      'description',
      'quantity',
      'value',
      'new',
      'sale',
      'public',
      'missing_parts',
      'serial',
      'url'
    ];

}
