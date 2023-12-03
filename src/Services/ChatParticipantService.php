<?php

namespace Fintech\Chat\Services;


use Fintech\Chat\Interfaces\ChatParticipantRepository;

/**
 * Class ChatParticipantService
 * @package Fintech\Chat\Services
 *
 */
class ChatParticipantService
{
    /**
     * ChatParticipantService constructor.
     * @param ChatParticipantRepository $chatParticipantRepository
     */
    public function __construct(ChatParticipantRepository $chatParticipantRepository) {
        $this->chatParticipantRepository = $chatParticipantRepository;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->chatParticipantRepository->list($filters);

    }

    public function create(array $inputs = [])
    {
        return $this->chatParticipantRepository->create($inputs);
    }

    public function find($id, $onlyTrashed = false)
    {
        return $this->chatParticipantRepository->find($id, $onlyTrashed);
    }

    public function update($id, array $inputs = [])
    {
        return $this->chatParticipantRepository->update($id, $inputs);
    }

    public function destroy($id)
    {
        return $this->chatParticipantRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->chatParticipantRepository->restore($id);
    }

    public function export(array $filters)
    {
        return $this->chatParticipantRepository->list($filters);
    }

    public function import(array $filters)
    {
        return $this->chatParticipantRepository->create($filters);
    }
}
