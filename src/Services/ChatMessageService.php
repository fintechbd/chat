<?php

namespace Fintech\Chat\Services;


use Fintech\Chat\Interfaces\ChatMessageRepository;

/**
 * Class ChatMessageService
 * @package Fintech\Chat\Services
 *
 */
class ChatMessageService
{
    /**
     * ChatMessageService constructor.
     * @param ChatMessageRepository $chatMessageRepository
     */
    public function __construct(ChatMessageRepository $chatMessageRepository) {
        $this->chatMessageRepository = $chatMessageRepository;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->chatMessageRepository->list($filters);

    }

    public function create(array $inputs = [])
    {
        return $this->chatMessageRepository->create($inputs);
    }

    public function find($id, $onlyTrashed = false)
    {
        return $this->chatMessageRepository->find($id, $onlyTrashed);
    }

    public function update($id, array $inputs = [])
    {
        return $this->chatMessageRepository->update($id, $inputs);
    }

    public function destroy($id)
    {
        return $this->chatMessageRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->chatMessageRepository->restore($id);
    }

    public function export(array $filters)
    {
        return $this->chatMessageRepository->list($filters);
    }

    public function import(array $filters)
    {
        return $this->chatMessageRepository->create($filters);
    }
}
