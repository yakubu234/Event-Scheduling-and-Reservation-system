<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->uid,
            'event_name' => $this->event_name,
            'location' => $this->location,
            'event_date' => $this->event_date,
            'event_uid' => $this->uid,
            'maximun_seats' => $this->maximun_seats,
            'start_time' => $this->start_time,
            'media_file' => $this->file,
            'type' => $this->type,
            'user' => $this->user,
            'ticket' => $this->ticket,

        ];
    }
}
