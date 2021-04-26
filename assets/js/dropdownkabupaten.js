// get kabupaten
jQuery(document).on('change', 'select#kabupaten', function (e) {
    e.preventDefault();
    var regencyID = jQuery(this).val();
    getRegencyList(regencyID);
});

// get kecamatan
jQuery(document).on('change', 'select#kecamatan', function (e) {
    e.preventDefault();
    var districtID = jQuery(this).val();
    getCityList(districtID);

});

// function get All States
function getRegencyList(regencyID) {
    $.ajax({
        url: baseurl + "admin/getDistricts",
        type: 'post',
        data: {regencyID: regencyID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('select#kecamatan').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Select Kecamatan</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].id_kecamatan + '">' + json[i].kecamatan + '</option>';
            }
            jQuery("select#kecamatan").html(options);

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

// function get All Cities
function getCityList(districtID) {
    $.ajax({
        url: baseurl + "admin/getVillages",
        type: 'post',
        data: {districtID: districtID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('select#kelurahan').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Select Kelurahan</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].id_kecamatan + '">' + json[i].kecamatan + '</option>';
            }
            jQuery("select#kelurahan").html(options);

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}