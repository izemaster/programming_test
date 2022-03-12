<?php

namespace App\Observers;
use Elasticsearch\Client;
class CarObserver
{
    private $client;

    public function __construct(Client $client){

        $this->client = $client;
    }

    public function created($model){
        $this->client->index([
            'index' => $model->getTable(),
            'type' => $model->getTable(),
            'id'=> $model->id,
            'body' => $model->toArray()
        ]);


    }

    public function updated($model){
        $this->client->update([
            'index' => $model->getTable(),
            'id'=> $model->id,
            'body' => [
                'doc' => $model->toArray()
            ]
        ]);


    }
}
