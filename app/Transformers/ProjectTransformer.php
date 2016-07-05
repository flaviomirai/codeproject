<?php

namespace CodeProject\Transformers;

use League\Fractal\TransformerAbstract;
use CodeProject\Entities\Project;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members','client'];
    /**
     * Transform the \Project entity
     * @param \Project $model
     *
     * @return array
     */
    public function transform(Project $model)
    {
        return [
            'id' => (int) $model->id,
            'client_id' => (int) $model->client_id,
            'owner_id' => (int) $model->owner_id,
            'name' => $model->name,
            'description' => $model->description,
            'progress' => $model->progress,
            'status' => $model->status,
            'due_date' => $model->due_date
        ];
    }

    public function includeMembers(Project $model)
    {
        return $this->collection($model->members, new ProjectMemberTransformer());
    }

    public function includeClient(Project $model)
    {
        return $this->item($model->client, new ClientTransformer());
    }

}
