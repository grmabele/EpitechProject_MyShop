<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'private' => $this->private,
            'logo_url' => $this->logo_url,
            'cover_photo_url'=> $this->cover_photo_url,
            'recruitment_url' => $this->recruitment_url,
            'short_description' =>$this->short_description,
            'ceo_name' => $this->ceo_name,
            'full_description' => $this->full_description,
            'why_join_us' => $this->why_join_us,
            'need_profiles' => $this->need_profiles,
            'discover_our_teams' => $this->discover_our_teams,
            'locale' => $this->locale
        ];

    }
}
