$(function(){
    "use strict"

    getCartItems();
    getMainCartItems();
    getWishlistCount();
    getComparelistCount()

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
                $(".qty-val").text('1');
                $(".wishList").attr('data-id', id);
                $(".compare").attr('data-id', id);
                $(".mainImg").attr('src', data.product.image);
                $(".thumbImg>img").attr('src', data.product.image);
                $(".pdctUrl").attr('href', '/product/'+data.product.slug+'/'+data.product.id);
                $(".pdctName").html(data.product.name);
                $(".pdctBrand").html(data.product.brand.name);
                $(".selling-price").html(data.currency+data.product.selling_price);
                $(".old-price").html(data.currency+data.product.mrp);                
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
                failed(res);
            }
        });
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
                    success(res);
                }else{
                    error(res);
                }
            },
            error: function(res){
                failed(res);
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
                getComparelistCount()
                if($.isEmptyObject(res.error)){
                    success(res);
                }else{
                    error(res);
                }
            },
            error: function(res){
                failed(res);
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
                getCartItems();
                if($.isEmptyObject(res.error)){                    
                    $('#frmAddToCart').trigger("reset");
                    success(res);
                }else{
                    error(res);
                }
            },
            error: function(res){
                failed(res);
            },
            complete: function(){
                $(".btn-submit").attr("disabled", false);
                $(".btn-submit").html("Add to Cart");
            }
        });
    });

    $(document).on('click', '.removeCartItem', function(){
        var dis = $(this);
        var id = dis.data('id');
        $.ajax({
            type: 'GET',
            url: '/cart/product/remove/'+id,
            dataType: 'json',
            success: function(res){
                getCartItems();
                getMainCartItems();
                if($.isEmptyObject(res.error)){
                    success(res);
                }else{
                    error(res);
                }
            },
            error: function(res){
                failed(res);
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
                    success(res);
                }else{
                    error(res);
                }
            },
            error: function(res){
                failed(res);
            }
        })
    });

    $(document).on("click", ".qUp", function(){
        var dis = $(this);
        var id = dis.data('id');
        $.ajax({
            type: 'POST',
            url: '/cart/product/update/increment',
            data: {'id': id},
            dataType: 'json',
            success: function(res){
                getCartItems();
                getMainCartItems();
                success(res)
            },
            error: function(err){
                failed(err)
            }
        })
    });

    $(document).on("click", ".qDown", function(){
        var dis = $(this);
        var id = dis.data('id');
        $.ajax({
            type: 'POST',
            url: '/cart/product/update/decrement',
            data: {'id': id},
            dataType: 'json',
            success: function(res){
                getCartItems();
                getMainCartItems();
                success(res);
            },
            error: function(err){
                failed(err)
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
            $(".cartCount").text(res.cart_qty);
            $(".shopping-cart-total span").text('₹'+res.cart_total);
            var cart = "<ul>";
            $.each(res.cart, function(key, item){
                cart += `<li><div class="row"><div class="shopping-cart-img col-3"><a href="/product/${item.slug}/${item.id}"><img alt="${item.name}" src="${item.options.image}" /></a></div><div class="shopping-cart-title col-6"><h6><a href="/product/${item.slug}/${item.id}">${item.name}</a></h6><h6 class="text-end"><span>${item.qty} × </span>${item.price}</h6></div><div class="col-2"><a href="javascript:void(0)" data-id="${item.rowId}" data-type='mini' class="removeCartItem"><i class="fi-rs-cross-small"></i></a></div></div></li>`;
            });
            cart += "</ul>";            
            $(".miniCart").html(cart);
        }
    })
}

function getMainCartItems(){
    $.ajax({
        type: 'GET',
        url: '/cart/product/get',
        dataType: 'json',
        success: function(res){
            var cart = "";
            $.each(res.cart, function(key, item){
                cart += `<tr>
                    <td class="image product-thumbnail"><img src="${item.options.image}" alt="${item.name}"></td>
                    <td class="product-des product-name">
                        <h5 class="product-name"><a href="/product/${item.slug}/${item.id}">${item.name}</a></h5>
                        <p class="font-xs">Color: ${item.options.color}, Size: ${item.options.size}</p>
                    </td>
                    <td class="price" data-title="Price"><span>${item.options.currency+item.price}</span></td>
                    <td class="text-center" data-title="Stock">
                        <div class="detail-qty border radius  m-auto">
                            <a href="javascript:void(0)" class="qty-down qDown" data-id="${item.rowId}"><i class="fi-rs-angle-small-down"></i></a>
                            <span class="qty-val">${item.qty}</span>
                            <a href="javascript:void(0)" class="qty-up qUp" data-id="${item.rowId}"><i class="fi-rs-angle-small-up"></i></a>
                        </div>
                    </td>
                    <td class="text-right" data-title="Cart">
                        <span>${item.options.currency+item.subtotal}</span>
                    </td>
                    <td class="action" data-title="Remove"><a href="javascript:void(0)" class="text-muted removeCartItem" data-id="${item.rowId}"><i class="fi-rs-trash"></i></a></td>
                </tr>`;
            });   
            cart += `<tr>
                <td colspan="6" class="text-end">
                    <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                </td>
            </tr>`        
            $(".mainCart").html(cart);
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

function getComparelistCount(){
    $.ajax({
        type: 'GET',
        url: '/compare/items/get',
        dataType: 'json',
        success: function(res){
            $(".comCount").text(res.comcount);
        }
    })
}

setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);

const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

function success(res){
    toast.fire({
        icon: 'success',
        title: res.success,
        color: 'green'
    })
}

function error(res){
    toast.fire({
        icon: 'error',
        title: res.error,
        color: 'red'
    });
}

function failed(res){
    var msg = JSON.parse(res.responseText);
    toast.fire({
        icon: 'error',
        title: msg.message,
        color: 'red'
    })
}


