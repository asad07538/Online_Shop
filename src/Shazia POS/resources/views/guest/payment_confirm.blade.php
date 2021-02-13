@extends('layouts.app')

@section('content')


<div class=" p-3 text-center">
<h1 class="text-center">Order No: {{$transaction->order->id}}</h1>
<h3 class="text-center">Date: {{$transaction->order->order_date}}</h3>
</div>
<div class="row justify-content-center p-3 " >
<table class="col-md-8 table table-responsive-sm   bg-white " style="border-radius: 20px;">
<thead>
<tr>
<th>Product</th>
<th>Amount</th>
<th>Total</th>
</tr>
</thead>
<tbody>
@foreach($transaction->order->order_details as $order_detial)
<tr>
<td>{{$order_detial->product->phone_model->name}}</td>
<td>{{$order_detial->order->total}}</td>
<td>{{$order_detial->order->total}}</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
<td colspan="5" class="text-center">
<button type="button"  class="btn btn-primary">Cancel</button>

<button type="button"  class="btn btn-primary " onclick="submitForm()">Jazz Pay</button>
<a href="{{ route('dummypay',$transaction->id)}}">Continue Without Pay for Debugging</a>
</td>
</tr>
</tfoot>
</table>
</div>




<style>
    body {
        background: #fff;
    }

    form {
        margin: 0;
        padding: 0;
    }

    .jsformWrapper {
        border: 1px solid rgba(196, 21, 28, 0.50);
        padding: 2rem;
        width: 600px;
        margin: 0 auto;
        border-radius: 2px;
        margin-top: 2rem;
        box-shadow: 0 7px 5px #eee;
        padding-bottom: 4rem;
    }

        .jsformWrapper .formFielWrapper label {
            width: 300px;
            float: left;
        }

        .jsformWrapper .formFielWrapper input {
            width: 300px;
            padding: 0.5rem;
            border: 1px solid #ccc;
            float: left;
            font-family: sans-serif;
        }

        .jsformWrapper .formFielWrapper select {
            width: 300px;
            padding: 0.5rem;
            border: 1px solid #ccc;
            float: left;
            font-family: sans-serif;
        }

        .jsformWrapper .formFielWrapper {
            float: left;
            margin-bottom: 1rem;
        }

        .jsformWrapper button {
            background: rgba(196, 21, 28, 1);
            border: none;
            color: #fff;
            width: 120px;
            height: 40px;
            line-height: 25px;
            font-size: 16px;
            font-family: sans-serif;
            text-transform: uppercase;
            border-radius: 2px;
            cursor: pointer;
        }

    h3 {
        text-align: center;
        margin-top: 3rem;
        color: rgba(196, 21, 28, 1);
    }
</style>
<script>
    function submitForm() {

        CalculateHash();
        var IntegritySalt = document.getElementById("salt").innerText;
        var hash = CryptoJS.HmacSHA256(document.getElementById("hashValuesString").value, IntegritySalt);
        document.getElementsByName("pp_SecureHash")[0].value = hash + '';

        console.log('string: ' + hashString);
        console.log('hash: ' + document.getElementsByName("pp_SecureHash")[0].value);

        document.jsform.submit();
    }
</script>
<script src="https://sandbox.jazzcash.com.pk/Sandbox/Scripts/hmac-sha256.js"></script>

<!-- <h3>JazzCash HTTP POST (Page Redirection) Testing</h3> -->
<div class="jsformWrapper" style="visibility: hidden;">
    <form name="jsform" method="post" action="https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/">

        <div class="formFielWrapper">
            <label class="active">pp_Version: </label>
            <select name="pp_Version" id="pp_Version">
                <option value="2.0" selected="">2.0</option>
            </select>
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_IsRegisteredCustomer: </label>
            <select name="pp_IsRegisteredCustomer" id="pp_IsRegisteredCustomer">
                <option value="Yes" selected="">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        <div class="formFielWrapper">
            <!-- <label class="active">pp_TxnType: </label> -->
            <input type="hidden" name="pp_TxnType" value="MPAY">
        </div>

        <div class="formFielWrapper">
            <!-- <label class="active">pp_TokenizedCardNumber: </label> -->
            <input type="hidden" name="pp_TokenizedCardNumber" value="">
        </div>

        <div class="formFielWrapper">
            <!-- <label class="active">pp_CustomerID: </label> -->
            <input type="hidden" name="pp_CustomerID" value="">
        </div>

        <div class="formFielWrapper">
            <!-- <label class="active">pp_CustomerEmail: </label> -->
            <input type="hidden" name="pp_CustomerEmail" value="">
        </div>

        <div class="formFielWrapper">
            <!-- <label class="active">pp_CustomerMobile: </label> -->
            <input type="hidden" name="pp_CustomerMobile" value="">
        </div>

        <div class="formFielWrapper">
            <!-- <label class="active">pp_MerchantID: </label> -->
            <input type="hidden" name="pp_MerchantID" value="MC13410">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_Language: </label>
            <input type="hidden" name="pp_Language" value="EN">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_SubMerchantID: </label>
            <input type="hidden" name="pp_SubMerchantID" value="">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_Password: </label>
            <input type="hidden" name="pp_Password" value="603g337622">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_TxnRefNo: </label>
            <input type="hidden" name="pp_TxnRefNo" id="pp_TxnRefNo" value="{{$transaction->id}}">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_Amount: </label>
            <input type="hidden" name="pp_Amount" value="10000">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_DiscountedAmount: </label>
            <input type="hidden" name="pp_DiscountedAmount" value="">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_DiscountBank: </label>
            <input type="hidden" name="pp_DiscountBank" value="">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_TxnCurrency: </label>
            <input type="hidden" name="pp_TxnCurrency" value="PKR">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_TxnDateTime: </label>
            <input type="hidden" name="pp_TxnDateTime" id="pp_TxnDateTime" value="20201210124844">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_TxnExpiryDateTime: </label>
            <input type="hidden" name="pp_TxnExpiryDateTime" id="pp_TxnExpiryDateTime" value="20201211124844">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_BillReference: </label>
            <input type="hidden" name="pp_BillReference" value="billRef">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_Description: </label>
            <input type="hidden" name="pp_Description" value="Description of transaction">
        </div>

        <div class="formFielWrapper">
            <label class="active">pp_ReturnURL: </label>
            <input type="hidden" name="pp_ReturnURL" value="http://127.0.0.1:8000/payment_sucess/">
        </div>


        <div class="formFielWrapper">
            <label class="active">pp_SecureHash: </label>
            <input type="hidden" name="pp_SecureHash" value="0123456789">
        </div>

        <div class="formFielWrapper">
            <label class="active">ppmpf 1: </label>
            <input type="hidden" name="ppmpf_1" value="1">
        </div>

        <div class="formFielWrapper">
            <label class="active">ppmpf 2: </label>
            <input type="hidden" name="ppmpf_2" value="2">
        </div>

        <div class="formFielWrapper">
            <label class="active">ppmpf 3: </label>
            <input type="hidden" name="ppmpf_3" value="3">
        </div>

        <div class="formFielWrapper">
            <label class="active">ppmpf 4: </label>
            <input type="hidden" name="ppmpf_4" value="4">
        </div>

        <div class="formFielWrapper">
            <label class="active">ppmpf 5: </label>
            <input type="hidden" name="ppmpf_5" value="5">
        </div>

        <button type="button" onclick="submitForm()">Submit</button>

    </form>

    <label id="salt" style="display:none;">w08zvyw4t4</label>
    <br><br>
    <div class="formFielWrapper" style="margin-bottom: 2rem;">
        <label class="active">Hash values string: </label>
        <input type="hidden" id="hashValuesString" value="">
        <br><br>
    </div>

</div>

<script>

    function CalculateHash() {
        var IntegritySalt = document.getElementById("salt").innerText;
        hashString = '';

        hashString += IntegritySalt + '&';

        if (document.getElementsByName("pp_Amount")[0].value != '') {
            hashString += document.getElementsByName("pp_Amount")[0].value + '&';
        }

        if (document.getElementsByName("pp_BillReference")[0].value != '') {
            hashString += document.getElementsByName("pp_BillReference")[0].value + '&';
        }
        if (document.getElementsByName("pp_CustomerEmail")[0].value != '') {
            hashString += document.getElementsByName("pp_CustomerEmail")[0].value + '&';
        }
        if (document.getElementsByName("pp_CustomerID")[0].value != '') {
            hashString += document.getElementsByName("pp_CustomerID")[0].value + '&';
        }
        if (document.getElementsByName("pp_CustomerMobile")[0].value != '') {
            hashString += document.getElementsByName("pp_CustomerMobile")[0].value + '&';
        }
        if (document.getElementsByName("pp_Description")[0].value != '') {
            hashString += document.getElementsByName("pp_Description")[0].value + '&';
        }
        if (document.getElementsByName("pp_IsRegisteredCustomer")[0].value != '') {
            hashString += document.getElementsByName("pp_IsRegisteredCustomer")[0].value + '&';
        }
        if (document.getElementsByName("pp_Language")[0].value != '') {
            hashString += document.getElementsByName("pp_Language")[0].value + '&';
        }
        if (document.getElementsByName("pp_MerchantID")[0].value != '') {
            hashString += document.getElementsByName("pp_MerchantID")[0].value + '&';
        }
        if (document.getElementsByName("pp_Password")[0].value != '') {
            hashString += document.getElementsByName("pp_Password")[0].value + '&';
        }
        if (document.getElementsByName("pp_ReturnURL")[0].value != '') {
            hashString += document.getElementsByName("pp_ReturnURL")[0].value + '&';
        }
        if (document.getElementsByName("pp_SubMerchantID")[0].value != '') {
            hashString += document.getElementsByName("pp_SubMerchantID")[0].value + '&';
        }
        if (document.getElementsByName("pp_TokenizedCardNumber")[0].value != '') {
            hashString += document.getElementsByName("pp_TokenizedCardNumber")[0].value + '&';
        }
        if (document.getElementsByName("pp_TxnCurrency")[0].value != '') {
            hashString += document.getElementsByName("pp_TxnCurrency")[0].value + '&';
        }
        if (document.getElementsByName("pp_TxnDateTime")[0].value != '') {
            hashString += document.getElementsByName("pp_TxnDateTime")[0].value + '&';
        }
        if (document.getElementsByName("pp_TxnExpiryDateTime")[0].value != '') {
            hashString += document.getElementsByName("pp_TxnExpiryDateTime")[0].value + '&';
        }
        if (document.getElementsByName("pp_TxnRefNo")[0].value != '') {
            hashString += document.getElementsByName("pp_TxnRefNo")[0].value + '&';
        }

        if (document.getElementsByName("pp_TxnType")[0].value != '') {
            hashString += document.getElementsByName("pp_TxnType")[0].value + '&';
        }

        if (document.getElementsByName("pp_Version")[0].value != '') {
            hashString += document.getElementsByName("pp_Version")[0].value + '&';
        }
        if (document.getElementsByName("ppmpf_1")[0].value != '') {
            hashString += document.getElementsByName("ppmpf_1")[0].value + '&';
        }
        if (document.getElementsByName("ppmpf_2")[0].value != '') {
            hashString += document.getElementsByName("ppmpf_2")[0].value + '&';
        }
        if (document.getElementsByName("ppmpf_3")[0].value != '') {
            hashString += document.getElementsByName("ppmpf_3")[0].value + '&';
        }
        if (document.getElementsByName("ppmpf_4")[0].value != '') {
            hashString += document.getElementsByName("ppmpf_4")[0].value + '&';
        }
        if (document.getElementsByName("ppmpf_5")[0].value != '') {
            hashString += document.getElementsByName("ppmpf_5")[0].value + '&';
        }

        hashString = hashString.slice(0, -1);
        document.getElementById("hashValuesString").value = hashString;
    }



</script>


@endsection