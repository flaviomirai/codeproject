<?php
namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Services\ProjectNoteService;
use Illuminate\Http\Request;


class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteRepository
     */
    private $repository;
    /**
     * @var ProjectNoteService
     */
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
    {

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id, $noteId)
    {
        $result = $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
        if($result['data'] && count($result['data'] == 1)){
            $result = [
                'data' => $result['data'][0]
            ];
        }
        return $result;
    }

    public function update(Request $request, $noteId)
    {
        return $this->service->update($request->all(), $noteId);
    }

    public function destroy($id)
    {
        if ($this->repository->delete($id)) {
            return ['success' => true];
        }
    }
}
