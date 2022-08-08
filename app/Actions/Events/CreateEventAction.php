<?php

namespace App\Actions\Events;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class CreateEventAction
{
    use ResponseTrait;

    protected $data;

    public function execute(array $data)
    {
        $this->data = $data;
        return $this->create();
    }

    private function create()
    {

        $this->data = array_merge($this->data, [
            'uid' => Str::orderedUuid()
        ]);

        $event = Event::create($this->data);

        return $this->success(['event' => new EventResource($event)], 'Event added successfully');
    }
}
