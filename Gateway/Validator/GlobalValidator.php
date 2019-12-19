<?php

namespace GreenPaymentProcessing\GreenpayGateway\Gateway\Validator;

use Magento\Payment\Gateway\Validator\AbstractValidator;
use Magento\Payment\Gateway\Validator\ResultInterface;
use GreenPaymentProcessing\GreenpayGateway\Gateway\Http\Client\ClientMock;

class GlobalValidator extends AbstractValidator {
    /**
     * Global Validator is called every time before an order is created. See what this does when we get to it.
     */
    public function validate(array $validationSubject){
        $isValid = false;
        $storeId = $validationSubject["storeId"];

        return $this->createResult($isValid);
    }
}
