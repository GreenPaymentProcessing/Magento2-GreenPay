<?php

namespace GreenPaymentProcessing\GreenpayGateway\Model\Adminhtml\Source;

use Magento\Payment\Model\Method\AbstractMethod;

/**
 * Class PaymentAction
 */
class Environment implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => 'live',
                'label' => __('Live')
            ],
            [
                'value' => 'test',
                'label' => __('Test')
            ]
        ];
    }
}
