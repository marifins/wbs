var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

$(function() {
    var uploadObj = null;
    var temp_name = "";
    $("#dokumen").prop("readonly", true);
    var uploadObj = $("#fileuploader").uploadFile({
        url:"assets/upload.php",
        multiple:true,
        fileName:"myfile",
        maxFileCount: 3,
        onSuccess:function(files,data,xhr){
            if(temp_name == ""){
                temp_name = files;
            }else{
                temp_name = temp_name +", "+files;
            }
            $("#dokumen").val(temp_name);
        }
    });

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
                                              
            var nama = $("input#nama").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var jlh_rugi = $("input#jlh_rugi").val();
            var pihak_terlibat = $("input#pihak_terlibat").val();
            var lokasi_kejadian = $("input#lokasi_kejadian").val();
            var waktu_kejadian = $("input#waktu_kejadian").val();
            var dokumen = $("input#dokumen").val();
            var kronologis = $("textarea#kronologis").val();
                                              
            $.ajax({
                url: baseUrl +"/laporan/insert",
                type: "POST",
                data: {
                    nama: nama,
                    email: email,
                    phone: phone,
                    jlh_rugi: jlh_rugi,
                    pihak_terlibat: pihak_terlibat,
                    lokasi_kejadian: lokasi_kejadian,
                    waktu_kejadian: waktu_kejadian,
                    dokumen: dokumen,
                    kronologis: kronologis
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Laporan anda telah terkirim kepada Komisi Pelaporan Pelanggaran PTPN I</strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                   
                   resetUpload(uploadObj);
                   temp_name = "";
                   
                   
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Maaf, ada kesalahan dalam pengiriman data. Silahkan coba kembali!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                   
                   resetUpload(uploadObj);
                   temp_name = "";
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});


function resetUpload(uploadObj){
    uploadObj.fileCounter = 1;
    uploadObj.selectedFiles = 0;
    uploadObj.fCounter = 0; //failed uploads
    uploadObj.sCounter = 0; //success uploads
    uploadObj.tCounter = 0; //total uploads
    $(".ajax-file-upload-statusbar").remove();
    $(".ajax-file-upload-error").remove();
    $("#dokumen").val("");
}

