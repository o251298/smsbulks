$(document).ready(function () {
    $('#btn-coast').click(function () {
        var count = $('#count').text();
        var group = $('#select').val();
        var request_data = {
            group_id: group,
            message_leng: count,
        };
        $.ajax({
            url: '/bulk/coast',
            method: 'POST',
            data: JSON.stringify(request_data),
            contentType: "application/json",
            success: function (data) {

                if (!data.error){
                    $("#error_response").css("display", "none");
                $("#table_response").css("display", "inline");
                $("#number_response").text('');
                $("#count_response").text('');
                $("#coats_response").text('');
                $("#number_response").text(data.number);
                $("#count_response").text(data.part);
                $("#coats_response").text(data.pay);
                }
                if (data.error){
                    $("#table_response").css("display", "none");
                    $("#error_response").css("display", "inline");
                    $("#error_response").text('');
                    $("#error_response").text(data.error);
                }
            },
        });
    });
});
