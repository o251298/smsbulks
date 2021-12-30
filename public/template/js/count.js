$(document).ready(function () {
    $('#textMessage').keyup(function () {
        var count = $(this).val();
        if ((/^([a-zA-Z]*)$/).test(count) && (/^([а-яА-ЯёЁ]*)$/).test(count)) console.log('В поле только латиница b rbhbkbwf')
        if ((/^([а-яА-ЯёЁ]*)$/).test(count)) console.log('В поле только кириллица')
        if ((/^([a-zA-Z]*)$/).test(count)) console.log('В поле только латиница')
        if ((/^([\s%&#@])*$/).test(count)) console.log('В поле недопустимые символы')
        count = count.length;
        $('#count').text('');
        $('#count').text(count);
    });
});
