@extends('frontend.layouts.app')
@section('style')
<style type="text/css">
.padding {
    padding: 5rem !important
}

.form-control:focus {
    box-shadow: 10px 0px 0px 0px #ffffff !important;
    border-color: #4ca746
}
</style>
@endsection
@section('content')

    <div class="py-5" id="page-content" style="background-color: #FCF8F0;">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="row mb-5">
                    <div class="col-4 my-auto">
                        <a href="#" onclick="window.history.back();" style="color: black;"><i class="fa fa-chevron-left" style="color: #F3795C;" aria-hidden="true"></i> Kembali</a>
                    </div>
                    <div class="col-4 my-auto">
                        <h1 class="h5 font-weight-bold text-center mb-0">Kartu Kredit</h1>
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="row pb-3" style="border-bottom: 1px solid #F3795C;">
                    <div class="col-6">
                        <p class="mb-0 text-left" style="font-size: 16px;">Total</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 text-right font-weight-bold" style="font-size: 24px; color: #F3795C;">Rp 360.000</p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-6">
                        <p class="mb-0 text-left" style="font-size: 14px;">Nomor Pesanan</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 text-right" style="font-size: 14px;">1234567890</p>
                    </div>
                </div>
                
                <p class="m-0" style="font-size: 15px; color: black;">Card Number<sup style="color: #F3795C;">*</sup></p>
                <div class="form-group">
                    <!-- <input type="tel" class="form-control rounded my-2 p-2 cc-number" name="card_number" id="cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" style="border-color: #F3795C;" required> -->
                    <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="m-0" style="font-size: 15px; color: black;">Expiry Date<sup style="color: #F3795C;">*</sup></p>
                        <div class="form-group">
                            <input type="tel" id="cc-exp" placeholder="MM/YY" class="form-control rounded my-2 p-2 cc-exp" name="expiry" autocomplete="cc-exp" placeholder="•• / ••" style="border-color: #F3795C;" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="m-0" style="font-size: 15px; color: black;">CW<sup style="color: #F3795C;">*</sup></p>
                        <div class="form-group">
                            <input type="tel"  id="cc-cvc" class="form-control rounded my-2 p-2 cc-cvc" name="cvc" id="credit_card_cw" autocomplete="off" placeholder="••••" style="border-color: #F3795C;" required>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" id="btn-submit" class="btn btn-danger text-center btn-pakai py-2 px-4 my-4 font-weight-bold" style="font-size: 18px;">BAYAR SEKARANG</button>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('script')
<script id="midtrans-script" type="text/javascript"
src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" 
data-environment="sandbox" 
data-client-key="{{ env('MITRANS_CLIENT_KEY') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.cc-number').payment('formatCardNumber');
    $('.cc-exp').payment('formatCardExpiry');
    $('.cc-cvc').payment('formatCardCVC');
    $('#btn-submit').click(function(){
        // var card = $('#cc-number').val();
        // var expiry = $('#cc-exp').val();
        // var cw= $('#cc-cvc').val();

        var cardData = {
          "card_number": 4617006959746656,
          "card_exp_month": 01,
          "card_exp_year": 2025,
          "card_cvv": 123,
        };

        // callback functions
        var options = {
          onSuccess: function(response){
            // Success to get card token_id, implement as you wish here
            console.log('Success to get card token_id, response:', response);
            var token_id = response.token_id;
            console.log('This is the card token_id:', token_id);
          },
          onFailure: function(response){
            // Fail to get card token_id, implement as you wish here
            console.log('Fail to get card token_id, response:', response);
          }
        };

        // trigger `getCardToken` function
        MidtransNew3ds.getCardToken(cardData, options);


    });


});




</script>
@endsection
