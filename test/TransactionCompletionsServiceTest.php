<?php
/**
 * We Are Planet Php SDK
 *
 * This library allows to interact with the We Are Planet payment service.
 *
 * Copyright owner: Wallee AG
 * Website: https://www.weareplanet.com
 * Developer email: ecosystem-team@wallee.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace WeArePlanet\Sdk\Test;

use PHPUnit\Framework\TestCase;
use WeArePlanet\Sdk\ApiException;
use WeArePlanet\Sdk\Model\Transaction;
use WeArePlanet\Sdk\Model\TransactionCreate;
use WeArePlanet\Sdk\Model\TransactionState;
use WeArePlanet\Sdk\Service\TransactionsService;
use WeArePlanet\Sdk\Service\TransactionCompletionsService;
use WeArePlanet\Sdk\Test\TestUtils;
use WeArePlanet\Sdk\Test\Constants;

class TransactionCompletionsServiceTest extends TestCase
{
    private static TransactionsService $transactionsService;
    private static TransactionCompletionsService $transactionCompletionsService;

    public static function setUpBeforeClass(): void
    {
        $configuration = Constants::getConfigurationInstance();
        self::$transactionsService = new TransactionsService($configuration);
        self::$transactionCompletionsService = new TransactionCompletionsService($configuration);
    }


    /**
     * Transaction completion read should return valid data.
     * IDs of transaction linked to TransactionCompletion and initial transaction should match.
     */
    public function testReadShouldReturnCompletedTransactionData(): void
    {
        $transactionCreate = TestUtils::getTransactionCreatePayload();
        $transaction = $this->create($transactionCreate);

        $processedTransaction = self::$transactionsService->postPaymentTransactionsIdProcessCardDetails(
            $transaction->getId(),
            Constants::$spaceId,
            Constants::getMockCardData()
        );

        $this->assertEquals(
            TransactionState::FULFILL,
            $processedTransaction->getState(),
            'State must be FULFILL'
        );

        $transactionCompletion = self::$transactionsService->postPaymentTransactionsIdCompleteOffline(
            $transaction->getId(),
            Constants::$spaceId
        );

        $readTransaction = self::$transactionsService->getPaymentTransactionsId(
            $transaction->getId(),
            Constants::$spaceId
        );

        $this->assertEquals(
            $transactionCompletion->getLinkedTransaction(),
            $readTransaction->getId(),
            'Transaction IDs must match'
        );
    }

    private function create(TransactionCreate $transactionCreate): Transaction
    {
        return self::$transactionsService->postPaymentTransactions(Constants::$spaceId, $transactionCreate);
    }
}
