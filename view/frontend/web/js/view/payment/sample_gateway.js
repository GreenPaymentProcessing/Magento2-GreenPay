/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'sample_gateway',
                component: 'GreenPaymentProcessing_GreenpayGateway/js/view/payment/method-renderer/sample_gateway'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({
            defaults: {
                paymentMethodNonce: null
            },
            getData: function() {
                var data = {
                    "method": this.getCode(),
                    "additional_data": {
                        "payment_method_nonce": this.paymentMethodNonce
                    }
                };
                return data;
            },
            setPaymentMethodNonce: function(paymentMethodNonce){
                this.paymentMethodNonce = paymentMethodNonce;
            },
            beforePlaceOrder: function(data){
                console.log("BeforePlaceOrder...", data);
                this.setPaymentMethodNonce(data.nonce);
                this.placeOrder();
            }
        });
    }
);
