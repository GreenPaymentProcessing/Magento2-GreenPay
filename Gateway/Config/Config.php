<?php

namespace GreenPaymentProcessing\GreenpayGateway\Gateway\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Config extends \Magento\Payment\Gateway\Config\Config
{
    const KEY_ENVIRONMENT = 'environment';
    const KEY_MID = 'client_id';
    const KEY_API_PASSWORD = 'api_password';

    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    private $serializer;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        $methodCode = null,
        $pathPattern = self::DEFAULT_PATH_PATTERN,
        Json $serializer = null){
        parent::__construct($scopeConfig, $methodCode, $pathPattern);
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()->get(Json::class);
    }

    /**
     * Gets value of configured environment
     *
     * Possible values: live or test
     *
     * @param int|null $storeId
     * @return string
     */
    public function getEnvironment($storeId = null) {
        return $this->getValue(Config::KEY_ENVIRONMENT, $storeId);
    }

    /**
     * Gets the current Merchant
     *
     * @param int|null $storeId
     * @return string
     */
    public function getMID($storeId = null){
        return $this->getValue(Config::KEY_MID, $storeId);
    }

    /**
     * Gets the current Merchant's API Password
     *
     * @param int|null $storeId
     * @return string
     */
    public function getAPIPassword($storeId = null){
        return $this->getValue(Config::KEY_API_PASSWORD, $storeId);
    }
}
