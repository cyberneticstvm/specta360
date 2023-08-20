$(function(){
    "use strict"

    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $(".profilePhoto, .img").change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $(".img-avatar, .image").attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });

    $("#dataTable").dataTable();

    $('.select2').select2({
        placeholder: 'Select',
    });

    $(document).on('click','.dlt',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
        title: '',
        text: "Are you sure want to cancel this record?",
        icon: 'warning',
        buttons: ["No", "Yes"],
        }).then((result) => {
        if(result){
            window.location.href = link
            /*swal(
            'Cancelled!',
            'Your file has been cancelled.',
            'success'
            )*/
        }
        })
    });

});
setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);