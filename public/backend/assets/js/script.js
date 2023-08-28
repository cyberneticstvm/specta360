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

    $(document).on("change", ".main_img", function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $("#main_img img").attr('src', e.target.result).width(80).height(80);
        }
        reader.readAsDataURL(e.target.files[0]);
    });

    $(document).on("change", ".multi_img", function(e){
        if (window.File && window.FileReader && window.FileList && window.Blob){
          var data = $(this)[0].files; //this file data           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#multi_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
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

    tinymce.init({
        selector: '#txtArea'
    });

});
setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);