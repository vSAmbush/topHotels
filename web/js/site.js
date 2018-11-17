//lifting up labels
$('.form-label').click(function () {
   $(this).animate({
      'marginTop': '-23px',
   }, 300);
});

//lifting up labels in inputs
$('.form-input').focus(function () {
    var id = $(this).attr('id');
    id = id.replace('applicationform-', '');
    var str = '#' + id + '-label';
    $(str).animate({'marginTop': '-23px'}, 300);
});

$('.form-input-item').focus(function () {
    var id = $(this).attr('id');
    id = id.replace('applicationform-', '');
    var str = '#' + id + '-label';
    $(str).animate({'marginTop': '-23px'}, 300);
});

//lifting down labels in inputs
$('.form-input').focusout(function () {
    if($(this).val() === '') {
        var id = $(this).attr('id');
        id = id.replace('applicationform-', '');
        var str = '#' + id + '-label';
        $(str).animate({'marginTop': '15px'}, 300);
    }
});

$('.form-input-item').focusout(function () {
    if($(this).val() === '') {
        var id = $(this).attr('id');
        id = id.replace('applicationform-', '');
        var str = '#' + id + '-label';
        $(str).animate({'marginTop': '15px'}, 300);
    }
});

//lifting up labels and increasing size in area
$('#area-label').click(function () {
   $(this).css({'display': 'none'});
   $('.form-area').animate({'height': '150px'}, 300);
   $('.form-area').focus();
});

$('.form-area').focus(function () {
    $('#area-label').css({'display': 'none'});
    $('.form-area').animate({'height': '150px'}, 300);
});

$('.form-area').focusout(function () {
    if($(this).val() === '') {
        $('#area-label').css({'display': 'inline-block', 'marginTop': '15px'});
    }
    $(this).animate({'height': '80px'}, 300);
});

//rotation chevron on language bar
var angle = 0;
var flag = false;
var start = false;

function rotation() {
    if(start) {
        if(flag) {
            angle += 3;
            if (angle <= 180)
                $('#lang-sel').css({'transform': 'rotate(' + angle + 'deg)'});
        } else {
            angle -= 3;
            if (angle >= 0)
                $('#lang-sel').css({'transform': 'rotate(' + angle + 'deg)'});
        }
    }
}

//rotating on click
$('.lang-sel').click(function () {
    flag = !flag;
    if(flag)
        angle = 0;
    else
        angle = 180;

    if(!start) {
        start = true;
        setInterval(rotation);
    }
    $('.eng').toggleClass('invis');
});

//choosing language
$('.child').click(function () {

    var text = $('.lang-sel').html();
    text = text.substr(0, 3);

    $('#language2').val(text);

    $('#language').val($(this).html());

    $('#lang-submit').click();
});

$('.block-hint i').mouseenter(function () {
    $(this).parent().find('div').css({'display': 'inline-block'});
});

$('.block-hint i').mouseleave(function () {
    $(this).parent().find('div').css({'display': 'none'});
});

//animation submit button (progress bar)
$('#application-form').on('beforeSubmit', function () {
    $('#spin').addClass('spin-text');
    $('.spinner').removeClass('invis');
});

//handling whole validation
$('#application-form').on('afterValidate', function () {
    //getting forms with errors
    var errors = $(this).find('.has-error');
    if(errors.length) {

        //showing error hint and error input border
        errors.find('.block-hint').css({'display': 'inline-block'});
        errors.parent().addClass('error-input');
    }
});

//handling attribute validating
$('#application-form').on('afterValidateAttribute', function (event, attribute, messages) {
    var success = $(this).find('.has-success');
    if(success.length) {

        success.find('.block-hint').css({'display': 'none'});
        success.parent().removeClass('error-input');
    }
});

//block submit
var isSumbit = false;
$('#application-form').submit(function () {
    $(this).find('.form-submit').prop('disabled', true);
});

//searching in mobile version
var isOpened = false;
$('.mobile-search').click(function () {
    if(!isOpened) {
        $(this).css({'color': '#475669'});
        $('.avatar').css({'display': 'none'});
        $('.nav-button').css({'display': 'none'});
        $('.lang-sel').css({'display': 'none'});
        $('.cancel-search').css({'display': 'inline-block'});
        $('.search-form').css({'display': 'inline-block'});
        isOpened = true;
    } else {
        $('#btn-search').click();
    }
});

//cancel searching
$('.cancel-search').click(function () {
    isOpened = false;
    $('.mobile-search').css({'color': '#ff8e41'});
    $('.avatar').css({'display': 'inline-block'});
    $('.nav-button').css({'display': 'inline-block'});
    $('.lang-sel').css({'display': 'inline-block'});
    $('.search-form').css({'display': 'none'});
    $(this).css({'display' : 'none'});
});