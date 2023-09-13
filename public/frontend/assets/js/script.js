$(function(){
    "use strict"

    getCartItems();
    getWishlistCount();

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
                $("#product_id").val(id);
                $(".wishList").attr('data-id', id);
                $(".compare").attr('data-id', id);
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
        });
    });

    const toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).on("click", ".wishList", function(e){
        var id = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:'/wishlist/add',
            data: {'product_id': id},
            dataType:'JSON',
            success: function(res){
                if($.isEmptyObject(res.error)){
                    getWishlistCount();
                    toast.fire({
                        icon: 'success',
                        title: res.success,
                        color: 'green'
                    })
                }else{
                    toast.fire({
                        icon: 'error',
                        title: res.error,
                        color: 'red'
                    });
                }
            },
            error: function(res){
                var msg = JSON.parse(res.responseText);
                toast.fire({
                    icon: 'error',
                    title: msg.message,
                    color: 'red'
                })
            }
        });
    });

    $(document).on("click", ".compare", function(e){
        var id = $(this).attr('data-id');
        $.ajax({
            type:'POST',
            url:'/compare/item/add',
            data: {'product_id': id},
            dataType:'JSON',
            success: function(res){
                if($.isEmptyObject(res.error)){
                    toast.fire({
                        icon: 'success',
                        title: res.success,
                        color: 'green'
                    })
                }else{
                    toast.fire({
                        icon: 'error',
                        title: res.error,
                        color: 'red'
                    });
                }
            },
            error: function(res){
                var msg = JSON.parse(res.responseText);
                toast.fire({
                    icon: 'error',
                    title: msg.message,
                    color: 'red'
                })
            }
        });
    });

    $(document).on("submit", "#frmAddToCart", function(e){
        e.preventDefault();
        var data = new FormData(this);
        data.append('qty', parseInt($(this).find(".qty-val").text()));
        $.ajax({
            type: 'POST',
            url: '/cart/product/add',
            data: data,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(res){
                $(".btn-close").click();
                $('#frmAddToCart').trigger("reset");
                getCartItems();
                if($.isEmptyObject(res.error)){
                    toast.fire({
                        icon: 'success',
                        title: res.success,
                        color: 'green'
                    })
                }
            },
            error: function(err){
                var msg = JSON.parse(err.responseText);
                toast.fire({
                    icon: 'error',
                    title: msg.message,
                    color: 'red'
                })
            },
            complete: function(){
                $(".btn-submit").attr("disabled", false);
                $(".btn-submit").html("Add to Cart");
                $(".qty-val").text('1');
            }
        });
    });

    $(document).on('click', '.removeCartItem', function(){
        var id = $(this).attr('id');
        $.ajax({
            type: 'GET',
            url: '/cart/product/remove/'+id,
            dataType: 'json',
            success: function(res){
                getCartItems();
                if($.isEmptyObject(res.error)){
                    toast.fire({
                        icon: 'success',
                        title: res.success,
                        color: 'green'
                    })
                }
            }
        })
    });

    $(document).on('click', '.rmWishList', function(){
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: '/wishlist/item/remove/'+id,
            dataType: 'json',
            success: function(res){
                $("#"+id).remove();
                getWishlistCount();
                if($.isEmptyObject(res.error)){
                    toast.fire({
                        icon: 'success',
                        title: res.success,
                        color: 'green'
                    })
                }
            }
        })
    });
});

function getCartItems(){
    $.ajax({
        type: 'GET',
        url: '/cart/product/get',
        dataType: 'json',
        success: function(res){
            $(".mini-cart-icon .pro-count").text(res.cart_qty);
            $(".shopping-cart-total span").text('₹'+res.cart_total);
            var cart = "<ul>";
            $.each(res.cart, function(key, item){
                cart += `<li><div class="row"><div class="shopping-cart-img col-3"><a href="/product/${item.slug}/${item.id}"><img alt="${item.name}" src="${item.options.image}" /></a></div><div class="shopping-cart-title col-6"><h6><a href="/product/${item.slug}/${item.id}">${item.name}</a></h6><h6 class="text-end"><span>${item.qty} × </span>${item.price}</h6></div><div class="col-2"><a href="javascript:void(0)" id="${item.rowId}" class="removeCartItem"><i class="fi-rs-cross-small"></i></a></div></div></li>`;
            });
            cart += "</ul>";            
            $(".miniCart").html(cart);
        }
    })
}

function getWishlistCount(){
    $.ajax({
        type: 'GET',
        url: '/wishlist/items/get',
        dataType: 'json',
        success: function(res){
            $(".wlCount").text(res.wlcount);
        }
    })
}

setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);


