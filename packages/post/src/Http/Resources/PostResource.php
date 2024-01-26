<?php
namespace Soa\Post\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $out = parent::toArray($request);
        return array_merge($out, [
            'user'=>new UserReflectionResource($this->user_reflection),
        ]);
    }
}
