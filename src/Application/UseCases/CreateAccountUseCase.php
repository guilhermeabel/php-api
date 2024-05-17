<?php

declare(strict_types=1);

namespace Application\UseCases;

use Application\Common\Enums\UserEventsEnum;
use Application\Entities\UserEntity;
use Application\Entities\UserEventsEntity;
use Application\Repositories\UserEventsRepository;
use Application\Repositories\UserRepository;
use Infrastructure\Database\Transaction;

class CreateAccountUseCase {
    private UserRepository $userRepository;
    private UserEventsRepository $userEventsRepository;
    private Transaction $transaction;

    public function __construct(Transaction $transaction, UserRepository $userRepository) {
        $this->transaction = $transaction;
        $this->userRepository = $userRepository;
    }

    public function execute(string $name, string $email, string $password): UserEntity {
        try {
            $this->transaction->begin();

            $user = UserEntity::create($name, $email, $password);
            $this->userRepository->save($user);

            $userCreatedEvent = UserEventsEntity::create($user->getId(), UserEventsEnum::USER_CREATED->value);
            $this->userEventsRepository->save($userCreatedEvent);

            $this->transaction->commit();
        } catch (\Throwable $e) {
            $this->transaction->rollback();

            throw $e;
        }

        return $user;
    }
}
