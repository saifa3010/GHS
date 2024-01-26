@extends('layouts.userPagesLayout')

@section('content')





<style>
    .panel-title {
    display: inline;
    font-weight: bold;
    }
    .display-table {
        display: table;
    }
    .display-tr {
        display: table-row;
    }
    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
    }
</style>


<div class="container">


{{-- <br><br><br><br> --}}
<div class="row">

    <div class="col-md-12">
        <div  class="panel panel-default credit-card-box "
         style="margin: 100px;background-color:white;padding:20px;border-radius:18px">

            <div class="panel-body">
                    <h3 class="header">Payment</h3>
                    <span>
                        <div class="" style="float: right;margin-top:-50px">
                            <img src="https://img.icons8.com/color/48/000000/visa.png"/>
                            <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
                            <img src="https://img.icons8.com/color/48/000000/maestro.png"/>
                        </div>
                    </span>

                 @if (Session::has('success'))
                 <div class="alert alert-success text-center">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     <p>{{ Session::get('success') }}</p>
                 </div>
             @endif

             @if (Session::has('error'))
                 <div class="alert alert-danger text-center">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     <p>{{ Session::get('error') }}</p>
                 </div>
             @endif

             <form role="form" action="{{ route('store.payment', ['id' => $task->id]) }}" method="post"
                 class="require-validation" data-cc-on-file="false"
                 data-stripe-publishable-key="{{ env('STRIPE_SECRET_KEY') }}" id="payment-form">
                 @csrf



                    <div class='form-row mt-3'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name on Card</label> <input
                                class='form-control'  type='text'>
                        </div>
                    </div>

                    <div class='form-row mt-3'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Card Number</label>
                            <input
                                class='form-control'
                                type='text'>
                        </div>
                    </div>

                    <div class='form-row row mt-3'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label> <input
                                class='form-control card-cvc' placeholder='ex. 311'
                                type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month' placeholder='MM'
                                type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year' placeholder='YYYY'
                                type='text'>
                        </div>
                    </div>




                    <div class="row mt-3">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {

var $form = $(".require-validation");

$('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]',
                     'input[type=text]', 'input[type=file]',
                     'textarea'].join(', '),
    $inputs       = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid         = true;
    $errorMessage.addClass('hide');

    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }

});

function stripeResponseHandler(status, response) {
    if (response.error) {
        $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
    } else {
        /* token contains id, last4, and card type */
        var token = response['id'];

        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        $form.get(0).submit();
    }
}

});
</script>




@endsection
