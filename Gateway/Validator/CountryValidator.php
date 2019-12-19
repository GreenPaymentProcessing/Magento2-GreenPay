<?php

namespace GreenPaymentProcessing\GreenpayGateway\Gateway\Validator;

use Magento\Payment\Gateway\Validator\AbstractValidator;
use Magento\Payment\Gateway\Validator\ResultInterface;
use GreenPaymentProcessing\GreenpayGateway\Gateway\Http\Client\ClientMock;

class CountryValidator extends AbstractValidator {
    /**
     * Generic country validation that pulls the store configuration and checks
     * whether or not the passed county is allowed
     */
    public function validate(array $validationSubject){
        $isValid = true;
        $storeId = $validationSubject["storeId"];

        if((int)$this->config->getValue("allowspecific", $storeId) === 1){
            $availableCountries = explode(",", $this->config->getValue("specificcountry", $storeId));
            if(!in_array($validationSubject['country'], $availableCountries)){
                $isValid = false;
            }
        }

        return $this->createResult($isValid);
    }
}
