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
                $(".pdctName").html(data.product.name);
                $(".pdctBrand").html(data.product.brand.name);
                $(".text-brand").html('₹'+data.product.selling_price);
                $(".old-price").html('₹'+data.product.mrp);                
                $(".save-price").html();
                $(".shortDesc").html(data.product.short_description);
                $(".pdctSKU").html('SKU: '+data.product.pcode);
                $(".in-stock").html(data.product.qty+' Items In Stock');
                $(".pdctTags").html('Tgas: '+data.tags);
                $.each(data.colors, function(key, value){
                    $(".color-filter").append("<li><a href='#' data-color="+value+"><span class='product-color-"+value+"'></span></a></li>");
                });
                $.each(data.sizes, function(key, value){
                    $(".size-filter").append("<li><a href='#'>"+value+"</a></li>");
                })
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