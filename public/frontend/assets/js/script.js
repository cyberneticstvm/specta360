$(function(){
    "use strict"
    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", ".quickView", function(e){
        var id = $(this).attr('id');
        $.ajax({
            type:'GET',
            url:'/productqv/details/'+id,
            dataType:'JSON',
            success:function(data){
                $(".mainImg").attr('src', data.product.image);
                $(".thumbImg>img").attr('src', data.product.image);
                $(".pdctUrl").attr('href', '/product/'+data.product.slug+'/'+data.product.id);
                $(".pdctName").html(data.product.name);
                $(".pdctBrand").html(data.product.brand.name);
                $(".text-brand").html('₹'+data.product.selling_price);
                $(".old-price").html('₹'+data.product.mrp);                
                $(".save-price").html();
                $(".shortDesc").html('Description: '+data.product.short_description);
                $(".pdctSKU").html('SKU: '+data.product.pcode);
                $(".in-stock").html('Availability: '+data.product.qty+' Items In Stock');
                $(".pdctTags").html('Tags: '+data.tags);
                $(".pdctStyle").html('Style: '+data.styles);
                $(".pdctMaterial").html('Material: '+data.materials);
                $(".color-filter").html("<option value=''>--Choose Color--</option>");
                $(".size-filter").html("<option value=''>--Choose Size--</option>");
                $.each(data.colors, function(key, value){
                    $(".color-filter").append("<option value='"+value+"'>"+value+"</option>");
                });
                $.each(data.sizes, function(key, value){
                    $(".size-filter").append("<option value='"+value+"'>"+value+"</option>");
                });
                if(data.product.prescription == 1){
                    $(".pdctPresc").removeClass('d-none');
                }else{
                    $(".pdctPresc").addClass('d-none');
                }
            },
            error:function(err){
                console.log(err);
            }
        })
    })
});
setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);