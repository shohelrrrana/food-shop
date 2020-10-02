$(function () {
    $('.woocommerce-ordering select').change(function () {
        this.form.submit();
    });
    $('.cart .quantity').addClass('product-stepper');
    $('.single_add_to_cart_button').removeClass('button');
    $('.single_add_to_cart_button').addClass('btn button-lg button-primary button-zakaria');
    $('.price_slider_amount button').removeClass('button');
    $('.price_slider_amount button').addClass('btn button-sm button-primary button-zakaria');

    $('.stepper-arrow').on('click', function () {
        $('.woocommerce-cart-form button').removeAttr('disabled');
    });

    $('.mini-cart .stepper-arrow').on('click', function () {
        var serializedData = $('.mini-cart').serializeArray();
        var submitUrl = $('.mini-cart').attr("action");
        //console.log(serializedData);
        //return;
        $.ajax({
            url: submitUrl,
            type: 'POST',
            data: serializedData
        });
    });
});