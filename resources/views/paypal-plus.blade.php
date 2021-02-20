<script
    src="https://www.paypalobjects.com/webstatic/ppplusdcc/ppplusdcc.min.js"
    type="text/javascript"
>
</script>

<div id="ppplus"></div>

<input
    type="hidden"
    id="paypal_approval_url"
    value="{{ $paymentData['links'][1]['href'] }}"
>
<input
    type="hidden"
    id="paypal_payment_id"
    value="{{ $paymentData['id'] }}"
>

<script type="application/javascript">
    var approvalUrl = document.getElementById('paypal_approval_url').value;
        var paymentId = document.getElementById('paypal_payment_id').value;

        var ppp = PAYPAL.apps.PPP({
            "approvalUrl": approvalUrl,
            "placeholder": "ppplus",
            "mode": "sandbox",
            "payerEmail": "tisuchi@gmail.com",
            "payerFirstName": "Thouhedul",
            "payerLastName": "Islam",
            "payerTaxId": "424.159.708-40",
            "country": "BR",
            "collectBillingAddress": false,
            onContinue: function (rememberedCards, payerId, token, term) {
                window.location = 'http://127.0.0.1:8000/paypal-approval?rememberedCards='
                    + rememberedCards 
                    + '&payerId=' + payerId
                    + '&token=' + token
                    + '&term=' + term
                    + '&paymentId=' + paymentId;
            },
        });
</script>

<button
    type="submit"
    id="continueButton"
    onclick="ppp.doContinue(); return false;"
> Checkout
</button>