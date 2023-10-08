$(document).ready(function () {
    'use strict';
    $('.confirm').click(function () {
        event.preventDefault();
        const CONFIRM =  confirm('هل أنت متأكد؟');
        if(CONFIRM === true) {
            $(this).parent().find('#delete-form').submit();
        }
    });

    $('.btn_confirm').click(function (e) {
        e.preventDefault();
        const CONFIRM =  confirm('هل أنت متأكد؟');
        if(CONFIRM === true) {
            // Here Code
            $(this).parent().submit();

        }
    });
    $('.BtnStatus').click(function (e) {
        e.preventDefault();
        const Self = $(this);
        const CONFIRM =  confirm('هل أنت متأكد؟');
        if(CONFIRM === true) {
            $('#statusForm').prop('action', Self.data('id')).submit();
        }
    });
    $('.confirmDeleteItem').click(function (e) {
        e.preventDefault();
        const Self = $(this);
        const CONFIRM =  confirm('هل أنت متأكد؟');
        if(CONFIRM === true) {
            $('#delete-form').prop('action', Self.data('id')).submit();
        }
    });

    // Check box select in table
    const DataSelect = $('#DataSelect');
    DataSelect.click(function () {
        const roleCheck = $('.DataCheckBox');
        if (DataSelect.prop('checked') === true) {
            roleCheck.prop('checked', true);
        } else {
            roleCheck.prop('checked', false);
        }
    });

    $('.IntVal').bind('keyup change', function () {
        $(this).val(Math.abs($(this).val()));
    });
    $('.numericValue').bind('keyup change', function () {
    });

    if ($(".preview_images").length > 0) {
        $('.preview_images').magnificPopup({delegate: 'a', type: 'image', gallery: {enabled: true}});
    }

    if ($(".open_img").length > 0) {
        $('.open_img').magnificPopup({delegate: 'a',type: 'image'});
    }

    // Unit Select
    $('#unit').change(function () {
       var Self = $(this);
        if(Self.val() !== null) {
            // console.log($('#unit option:not(:selected)').text());
            var UnitTitle = $('.unit_title');
            $('#SellingPrice .disabledInput').prop('disabled', false);
            $('#SellingPrice input, #SellingPrice select, #SellingPrice label').removeClass('disabledInput');
            UnitTitle.empty();
            UnitTitle.html($('#unit option:selected').text());
        }
    });

    // Question Checked Yes
    $('.question_sub input').click(function () {
        var Self = $(this);
        $('#tableSubPrice input').val('');
        if(Self.val() === 'yes') {
            $('#tableSubPrice').css('display', 'block');
            $('#tableSubPrice .disabledSub').prop('disabled', false);
        } else {
            $('#tableSubPrice').css('display', 'none');
            $('#tableSubPrice .disabledSub').prop('disabled', true);
        }
    });
});


$(window).load(function() {
   $('.disabledInput, .disabledSub').prop('disabled', true);
});


/****************************************************
 * Icons
 ***************************************************/
$('#changeIconSize').on('keyup change', function () {
    $(this).val(Math.abs($(this).val()));
    if($(this).val() > 100) {
        $(this).val(100);
    }
    if($(this).val() < 40) {
        $(this).val(40)
    }
    $('.icons_table .icon_shape i').css('font-size', $(this).val() + 'px');
});

$('.icon_box').click(function () {
    copyToClipboard($(this));
});

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(element.data('content')).select();
    document.execCommand("copy");
    $temp.remove();
    element.append("<span>تم النسخ بنجاح</span>");
    setTimeout(function () {
        element.find('span').remove();
    }, 1000);
}
