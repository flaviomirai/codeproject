<?php

namespace CodeProject\Repositories;

use CodeProject\Presenters\ClientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Repositories\ClientRepository;
use CodeProject\Entities\Client;
use CodeProject\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return ClientPresenter::class;
    }
}
