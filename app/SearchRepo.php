<?php

namespace App;
use Elasticsearch\Client;


class SearchRepo
{
    private $client;

    public function __construct(Client $client){
        $this->client = $client;
    }

    public function search($q = ''){
        $items = $this->client->search([
                    'index' => 'cars',
                    'type' => 'cars',
                    'body' => [
                        'query'=> [
                            "bool"=>[
                                "must"=>[
                                    'multi_match' => [
                                        'fields' => ['make','model','engine_size'],
                                        'query' => $q
                                    ]
                                ],
                                'filter' => [
                                    'term' => ['enabled' => true]
                                ]
                            ]

                        ],

                    ]
                ]);

        return $this->arrayToModel($items['hits']['hits']);
    }

    public function arrayToModel($cars){
        $items = array_map(function($item){
                    $car = Car::find($item["_id"]);
                    return $car;
                },$cars);

        return $items;

    }
}
