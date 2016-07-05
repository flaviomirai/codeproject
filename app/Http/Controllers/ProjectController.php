<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ProjectController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var ClientService
     */
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service)
    {

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    public function store(Request $request)
    {

        return $this->service->create($request->all());
    }

    public function show($id)
    {
        if($this->checkProjectPermisstions($id) == false){
            return ['error' => 'Access Forbiden'];
        };
        return $this->repository->find($id);
    }

    public function update(Request $request, $id)
    {
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbiden'];
        };
        return $this->service->update($request->all(),$id);
    }

    public function destroy($id)
    {
        if($this->checkProjectOwner($id) == false){
            return ['error' => 'Access Forbiden'];
        };
        return $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectId,$userId);
    }

    private function checkProjectMember($projectId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($projectId,$userId);
    }
    private function checkProjectPermisstions($projectId)
    {
        if($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)){
            return true;
        }
        return false;
    }
}
