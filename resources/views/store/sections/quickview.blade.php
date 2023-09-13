<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">              
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
            <div class="modal-body">                
                <form method="post" id="frmAddToCart" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="" />
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="" alt="" class="mainImg">
                                    </figure>                               
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div class="thumbImg"><img src="" alt=""></div>                              
                                </div>
                            </div>
                            <!-- End Gallery -->
                            <div class="row">
                                <div class="col-6 pdctSKU fw-bold"></div>
                                <div class="col-6 pdctTags fw-bold"></div>
                                <div class="col-6 pdctStyle fw-bold"></div>
                                <div class="col-6 pdctMaterial fw-bold"></div>
                                <div class="col-12 in-stock fw-bold"></div>                            
                            </div>
                            <div class="row mt-3">
                                <div class="col text-center"><a href="" class="btn btn-sm btn-outline text-dark pdctUrl">Explore Details</a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h3 class="title-detail mt-30 pdctName"></h3>
                                <div class="product-detail-rating">
                                    <div class="pro-details-brand">
                                        <span> Brand: <a href="/" class="pdctBrand"></a></span>
                                    </div>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <ins><span class="text-brand selling-price"></span></ins>
                                        <ins><span class="old-price font-md ml-15"></span></ins>
                                        <span class="save-price font-md color3 ml-15"></span>
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                <div class="short-desc mb-30">
                                    <p class="font-sm shortDesc"></p>
                                </div>
                                <div class="row">
                                    <div class="col form-group attr-detail attr-color mb-15">
                                        <label class="mr-5">Color</label>
                                        <select class="form-control form-control-sm color-filter" name="color"><option value="">--Choose Color--</option></select>
                                    </div>
                                    <div class="col form-group attr-detail attr-size">
                                        <label class="mr-5">Size</label>
                                        <select class="form-control form-control-sm size-filter" name="size"><option value="">--Choose Size--</option></select>
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="pdctPresc d-none">
                                    <div class="row">
                                        <div class="col-12"><h5 class="primary-color">Prescription (If required)</h5></div>
                                        <label class="fw-bold">RE</label>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="SPH" name="re_sph" /></div>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="CYL" name="re_cyl" /></div>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="AXIS" name="re_axis" /></div>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="ADD" name="re_add" /></div>
                                        <label class="fw-bold">LE</label>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="SPH" name="le_sph"/></div>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="CYL" name="le_cyl" /></div>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="AXIS" name="le_axis" /></div>
                                        <div class="col-3"><input type="text" class="form-control form-control-sm" maxlength="6" placeholder="ADD" name="le_add" /></div>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-12"><p class="primary-color text-center">OR</9></div>
                                        <label>Attach Prescription</label>
                                        <div class="col"><input type="file" class="form-control form-control-sm" name="prescription" /></div>
                                    </div>
                                    <br />
                                </div>
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button btn-submit button-add-to-cart">Add to Cart</button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="javasript:void(0)"><i class="fi-rs-heart wishList" data-id=""></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="javasript:void(0)"><i class="fi-rs-shuffle compare" data-id=""></i></a>
                                    </div>
                                </div>                            
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </form>                
            </div>        
        </div>
    </div>
</div>