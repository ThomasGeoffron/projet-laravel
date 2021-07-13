$(document).ready(function () {
    if ($('#armeRadio').is(':checked')) {
        $('#produitDiv').hide();
        $('#produitDiv option[value="default"]').prop('selected', true);
    } else {
        $('#armeDiv').hide();
        $('#armeDiv option[value="default"]').prop('selected', true);
    }
    $('#armeRadio').click(function () {
        $('#armeDiv').show()
        $('#produitDiv').hide();
        $('#produitDiv option[value="default"]').prop('selected', true);
    });

    $('#produitRadio').click(function () {
        console.log('arme');
        $('#armeDiv').hide();
        $('#produitDiv').show();
        $('#armeDiv option[value="default"]').prop('selected', true);
    });
})


