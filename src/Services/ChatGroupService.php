<?php

namespace Fintech\Chat\Services;

use Fintech\Chat\Interfaces\ChatGroupRepository;

/**
 * Class ChatGroupService
 */
class ChatGroupService extends \Fintech\Core\Abstracts\Service
{
    /**
     * ChatGroupService constructor.
     */
    public function __construct(ChatGroupRepository $chatGroupRepository)
    {
        $this->chatGroupRepository = $chatGroupRepository;
    }

    public function find($id, $onlyTrashed = false)
    {
        return $this->chatGroupRepository->find($id, $onlyTrashed);
    }

    public function update($id, array $inputs = [])
    {
        return $this->chatGroupRepository->update($id, $inputs);
    }

    public function destroy($id)
    {
        return $this->chatGroupRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->chatGroupRepository->restore($id);
    }

    public function export(array $filters)
    {
        return $this->chatGroupRepository->list($filters);
    }

    /**
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->chatGroupRepository->list($filters);

    }

    public function import(array $filters)
    {
        return $this->chatGroupRepository->create($filters);
    }

    public function create(array $inputs = [])
    {
        return $this->chatGroupRepository->create($inputs);
    }
}
