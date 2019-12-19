<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace GreenPaymentProcessing\GreenpayGateway\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;

class DataAssignObserver extends AbstractDataAssignObserver
{
    const PAYMENT_METHOD_NONCE = 'payment_method_nonce';

    protected $additionalInformationList = [
        self::PAYMENT_METHOD_NONCE
    ];

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $method = $this->readMethodArgument($observer);
        $data = $this->readDataArgument($observer);

        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
        if(!is_array($additionalData)){
            return;
        }

        // $paymentInfo = $method->getInfoInstance();
        //
        // if ($data->getDataByKey('transaction_result') !== null) {
        //     $paymentInfo->setAdditionalInformation(
        //         'transaction_result',
        //         $data->getDataByKey('transaction_result')
        //     );
        // }

        $paymentInfo = $this->readPaymentModelArgument($observer);

        foreach ($this->additionalInformationList as $additionalInformationKey) {
            if (isset($additionalData[$additionalInformationKey])) {
                $paymentInfo->setAdditionalInformation(
                    $additionalInformationKey,
                    $additionalData[$additionalInformationKey]
                );
            }
        }
    }
}
