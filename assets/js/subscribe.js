; (function ($) {
    $(document).ready(function () {

        
        $("#subscribe-form").on("submit", function (event) {
            event.preventDefault();
            let submitUrl = $(this).attr("action");
            let serializedData = $(this).serialize();
            let buttonText = $('#subscribe-form button').text();
            $.ajax({
                url: submitUrl,
                type: 'POST',
                data: serializedData,
                beforeSend: function () {
                    $('#subscribe-form button').text('Sending...');
                },
                success: function (response) {
                    $('#subscribe-form button').text(buttonText);
                    response = JSON.parse(response);
                    $("#subscribe-message").text(response.message).show(1000);

                },
            });
        });


    });
})(jQuery);