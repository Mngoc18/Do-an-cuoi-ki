<?php 
include('header.php'); 
?>
           <div class="search-bar-mobile">
                <div class="search-box wpo-wrapper-search">
                    <form action="/search" class="searchform searchform-categoris ultimate-search">
                        <div class="wpo-search-inner">
                            <input type="hidden" name="type" value="product"/>
                            <input required id="inputSearchAuto-mb" name="q" maxlength="40" autocomplete="off" class="searchinput input-search search-input" type="text" size="20" placeholder="Tìm kiếm sản phẩm...">
                        </div>
                        <button type="submit" class="btn-search btn" id="search-header-btn-mb">
                            <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                <path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z"></path>
                                <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8"></rect>
                            </svg>
                        </button>
                    </form>
                    <div id="ajaxSearchResults-mb" class="smart-search-wrapper ajaxSearchResults" style="display: none">
                        <div class="resultsContent"></div>
                    </div>
                </div>
            </div>
            <main class=" main-index">
                <h1 class="hidden entry-title">LUNASHOES</h1>
                <div id="home-slider">
                    <div id="homepage_slider" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="../Sản phẩm/Trang sản phẩm.html">
                                <img title="Banner" alt="" src="./Banner.png">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- SẢN PHẨM MỚi-->
                <section class="section section-collection">
                    <div class="wrapper-heading-home animation-tran text-center">
                        <div class="container-fluid">
                            <div class="site-animation">
                                <h2>
                                    <a href="/Cuối kì/Frontend/product.php">SẢN PHẨM MỚI</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-collection-1">
                        <div class="container-fluid">
                            <div class="clearfix content-product-list" id="collection-slide">
                                <div class="pro-loop animation-tran">
                                    <div class="product-block product-resize site-animation">
                                        <div class="product-img">
                                            <a href="/products/" title="GIÀY BÚP BÊ BỆT TRANG TRÍ KHÓA KIM LOẠI" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại đen 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại đen 3.webp">
													<img class="img-loop alt="GIÀY BÚP BÊ BỆT TRANG TRÍ KHÓA KIM LOẠI" src="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại đen 3.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại kem 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại kem 3.webp">
                                                    <img class="img-loop img-hover" alt="GIÀY BÚP BÊ BỆT TRANG TRÍ KHÓA KIM LOẠI" src="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại kem 3.webp "/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1116304525')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">265,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="" title="GIÀY BÚP BÊ BỆT TRANG TRÍ KHÓA KIM LOẠI">GIÀY BÚP BÊ BỆT TRANG TRÍ KHÓA KIM LOẠI</a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>265,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-loop animation-tran">
                                    <div class="product-block product-resize site-animation">
                                        <div class="product-img">
                                            <a href="/products/7p-nac278" title="CAO GÓT PHỐI SI VÂN" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân trắng 2.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân trắng 2.webp">
                                                    <img class="img-loop" alt=" CAO GÓT PHỐI SI VÂN " src="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân trắng 2.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân đen 2.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân đen 2.webp">
                                                    <img class="img-loop img-hover" alt=" CAO GÓT PHỐI SI VÂN " src="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân đen 2.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1116238094')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">269,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/" title="CAO GÓT PHỐI SI VÂN">CAO GÓT PHỐI SI VÂN</a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>269,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-loop animation-tran">
                                    <div class="product-block product-resize site-animation">
                                        <div class="product-img">
                                            <a href="/products/6p-nac289" title="SANDAL ĐẾ BỆT QUAI NGANG" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset=" ./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang trắng 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang trắng 3.webp">
                                                    <img class="img-loop" alt=" SANDAL ĐẾ BỆT QUAI NGANG" src="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang trắng 3.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang nâu 3.webp ">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang nâu 3.webp ">
                                                    <img class="img-loop img-hover" alt=" SANDAL ĐẾ BỆT QUAI NGANG" src="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang nâu 3.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1118068288')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">300,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/6p-nac289" title="SANDAL ĐẾ BỆT QUAI NGANG">SANDAL ĐẾ BỆT QUAI NGANG </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>300,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pro-loop animation-tran">
                                    <div class="product-block product-resize site-animation">
                                        <div class="product-img">
                                            <a href="/products/6p-nac290" title="GIÀY BÚP BÊ SLINGBACK ĐẾ BỆT MŨI LOAFER" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer kem 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer kem 3.webp">
                                                    <img class="img-loop" alt=" GIÀY BÚP BÊ SLINGBACK ĐẾ BỆT MŨI LOAFER " src="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer kem 3.webp "/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer đen 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer đen 3.webp">
                                                    <img class="img-loop img-hover" alt=" GIÀY BÚP BÊ SLINGBACK ĐẾ BỆT MŨI LOAFER " src="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer đen 3.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1118068515')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">300,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/6p-nac290" title="GIÀY BÚP BÊ SLINGBACK ĐẾ BỆT MŨI LOAFER">GIÀY BÚP BÊ SLINGBACK ĐẾ BỆT MŨI LOAFER </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>300,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-loop animation-tran">
                                    <div class="product-block product-resize site-animation">
                                        <div class="product-img">
                                            <a href="/products/5-nac294" title="GIÀY THỂ THAO WONDERLUST" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="/Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 2.webp">
                                                    <source media="(min-width: 768px)" srcset="/Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 2.webp">
                                                    <img class="img-loop" alt=" GIÀY THỂ THAO WONDERLUST " src="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 2.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 3.webp">
                                                    <img class="img-loop img-hover" alt=" GIÀY THỂ THAO WONDERLUST " src="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 3.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1122794880')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">280,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/5-nac294" title="GIÀY THỂ THAO WONDERLUST">GIÀY THỂ THAO WONDERLUST </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>280,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-loop animation-tran">
                                    <div class="product-block product-resize site-animation">
                                        <div class="product-img">
                                            <a href="/products/nac272" title="CAO GÓT QUAI MARY JANE" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane nâu 4.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane nâu 4.webp">
                                                    <img class="img-loop" alt=" CAO GÓT QUAI MARY JANE " src="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane nâu 4.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane trắng 4.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane trắng 4.webp">
                                                    <img class="img-loop img-hover" alt=" CAO GÓT QUAI MARY JANE " src="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane trắng 4.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1115586226')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">290,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/nac272" title="CAO GÓT QUAI MARY JANE">CAO GÓT QUAI MARY JANE</a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>290,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <!-- SẢN PHẨM BÁN CHẠY-->
                <section class="section section-collection">
                    <div class="wrapper-heading-home animation-tran text-center">
                        <div class="container-fluid">
                            <div class="site-animation">
                                <h2>
                                    <a href="../Sản phẩm/Trang sản phẩm.html">Sản phẩm bán chạy</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-collection-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="clearfix content-product-list ">
                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                                <a href="/products/" title="Giày Búp Bê Mũi Vuông Trang Trí Khoá" class="image-resize">
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê mũi vuông trang trí khoá/Giày búp bê mũi vuông trang trí khoá đen 3.webp">
                                                        <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê mũi vuông trang trí khoá/Giày búp bê mũi vuông trang trí khoá đen 3.webp">
                                                        <img class="img-loop" alt=" Giày Búp Bê Mũi Vuông Trang Trí Khoá " src="./Album cao gót/Giày búp bê mũi vuông trang trí khoá/Giày búp bê mũi vuông trang trí khoá đen 3.webp"/>
                                                    </picture>
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê mũi vuông trang trí khoá/Giày búp bê mũi vuông trang trí khoá kem 3.webp">
                                                        <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê mũi vuông trang trí khoá/Giày búp bê mũi vuông trang trí khoá kem 3.webp">
                                                        <img class="img-loop img-hover" alt=" Giày Búp Bê Mũi Vuông Trang Trí Khoá " src="./Album cao gót/Giày búp bê mũi vuông trang trí khoá/Giày búp bê mũi vuông trang trí khoá kem 3.webp"/>
                                                    </picture>
                                                </a>
                                                <div class="button-add hidden">
                                                    <button type="submit" title="Buy now" class="action" onclick="buy_now('1041192883')">
                                                        Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                    </button>
                                                </div>
                                                <div class="pro-price-mb">
                                                    <span class="pro-price">219,000₫</span>
                                                </div>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <div class="box-pro-detail">
                                                    <h3 class="pro-name">
                                                        <a href="/products/" title="Giày Búp Bê Mũi Vuông Trang Trí Khoá"> Giày Búp Bê Mũi Vuông Trang Trí Khoá </a>
                                                    </h3>
                                                    <div class="box-pro-prices">
                                                        <p class="pro-price ">
                                                            <span>219,000₫</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-5 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                                <a href="/products/" title="Sandal Dây Tròn" class="image-resize">
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset="./Album cao gót/Giày sandal dây tròn/Giày sandal dây tròn kem 3.webp ">
                                                        <source media="(min-width: 768px)" srcset=" ./Album cao gót/Giày sandal dây tròn/Giày sandal dây tròn kem 3.webp">
                                                        <img class="img-loop" alt=" Sandal Dây Tròn " src="./Album cao gót/Giày sandal dây tròn/Giày sandal dây tròn kem 3.webp"/>
                                                    </picture>
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset="./Album cao gót/Giày sandal dây tròn/Giày sandal dây tròn đen 3.webp ">
                                                        <source media="(min-width: 768px)" srcset=" ./Album cao gót/Giày sandal dây tròn/Giày sandal dây tròn đen 3.webp">
                                                        <img class="img-loop img-hover" alt=" Sandal Dây Tròn " src="./Album cao gót/Giày sandal dây tròn/Giày sandal dây tròn đen 3.webp "/>
                                                    </picture>
                                                </a>
                                                <div class="button-add hidden">
                                                    <button type="submit" title="Buy now" class="action" onclick="buy_now('1047693478')">
                                                        Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                    </button>
                                                </div>
                                                <div class="pro-price-mb">
                                                    <span class="pro-price">220,000₫</span>
                                                </div>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <div class="box-pro-detail">
                                                    <h3 class="pro-name">
                                                        <a href="/products/" title="Sandal Dây Tròn">Sandal Dây Tròn </a>
                                                    </h3>
                                                    <div class="box-pro-prices">
                                                        <p class="pro-price ">
                                                            <span>229,000₫</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                                <a href="/products/cao-got-mui-nhon-phoi-khoa-nad95" title="Cao Gót Xi Phối Khoá Trang Trí" class="image-resize">
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset=" ./Album cao gót/Giày cao gót xi phối khoá trang trí/Giày cao gót xi phối khoá trang trí trắng 4.webp">
                                                        <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót xi phối khoá trang trí/Giày cao gót xi phối khoá trang trí trắng 4.webp ">
                                                        <img class="img-loop" alt=" Cao Gót Xi Phối Khoá Trang Trí " src="./Album cao gót/Giày cao gót xi phối khoá trang trí/Giày cao gót xi phối khoá trang trí trắng 4.webp"/>
                                                    </picture>
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót xi phối khoá trang trí/Giày cao gót xi phối khoá trang trí kem 4.webp ">
                                                        <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót xi phối khoá trang trí/Giày cao gót xi phối khoá trang trí kem 4.webp ">
                                                        <img class="img-loop img-hover" alt=" Cao Gót Xi Phối Khoá Trang Trí " src="./Album cao gót/Giày cao gót xi phối khoá trang trí/Giày cao gót xi phối khoá trang trí kem 4.webp"/>
                                                    </picture>
                                                </a>
                                                <div class="button-add hidden">
                                                    <button type="submit" title="Buy now" class="action" onclick="buy_now('1045592977')">
                                                        Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                    </button>
                                                </div>
                                                <div class="pro-price-mb">
                                                    <span class="pro-price">259,000₫</span>
                                                </div>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <div class="box-pro-detail">
                                                    <h3 class="pro-name">
                                                        <a href="/products/cao-got-mui-nhon-phoi-khoa-nad95" title="Cao Gót Xi Phối Khoá Trang Trí">Cao Gót Xi Phối Khoá Trang Trí</a>
                                                    </h3>
                                                    <div class="box-pro-prices">
                                                        <p class="pro-price ">
                                                            <span>259,000₫</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                                <a href="/products/nac172" title="Sandal Quai Phồng" class="image-resize">
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset="./Album cao gót/Giày sandal quai phồng/Giày sandal quai phồng đen 3.webp ">
                                                        <source media="(min-width: 768px)" srcset="./Album cao gót/Giày sandal quai phồng/Giày sandal quai phồng đen 3.webp ">
                                                        <img class="img-loop" alt=" Sandal Quai Phồng " src="./Album cao gót/Giày sandal quai phồng/Giày sandal quai phồng đen 3.webp"/>
                                                    </picture>
                                                    <picture>
                                                        <source media="(max-width: 767px)" srcset=" ./Album cao gót/Giày sandal quai phồng/Giày sandal quai phồng trắng 3.webp ">
                                                        <source media="(min-width: 768px)" srcset=" ./Album cao gót/Giày sandal quai phồng/Giày sandal quai phồng trắng 3.webp ">
                                                        <img class="img-loop img-hover" alt=" Sandal Quai Phồng " src="./Album cao gót/Giày sandal quai phồng/Giày sandal quai phồng trắng 3.webp"/>
                                                    </picture>
                                                </a>
                                                <div class="button-add hidden">
                                                    <button type="submit" title="Buy now" class="action" onclick="buy_now('1062062000')">
                                                        Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                    </button>
                                                </div>
                                                <div class="pro-price-mb">
                                                    <span class="pro-price">265,000₫</span>
                                                </div>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <div class="box-pro-detail">
                                                    <h3 class="pro-name">
                                                        <a href="/products/nac172" title="Sandal Quai Phồng">Sandal Quai Phồng</a>
                                                    </h3>
                                                    <div class="box-pro-prices">
                                                        <p class="pro-price ">
                                                            <span>265,000₫</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                            <a href="/products/nac272" title="Cao gót quai Mary Jane" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane nâu 4.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane nâu 4.webp">
                                                    <img class="img-loop" alt=" Cao gót quai Mary Jane " src="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane nâu 4.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane trắng 4.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane trắng 4.webp">
                                                    <img class="img-loop img-hover" alt=" Cao gót quai Mary Jane " src="./Album cao gót/Giày cao gót quai Mary Jane/Giày cao gót quai Mary Jane trắng 4.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1115586226')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">290,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/nac272" title="Cao gót quai Mary Jane">Cao gót quai Mary Jane</a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>290,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                            <a href="/products/nac272" title="Giày Búp Bê Slingback Đế Bệt Mũi Loafer" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer kem 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer kem 3.webp">
                                                    <img class="img-loop" alt="Giày Búp Bê Slingback Đế Bệt Mũi Loafer" src="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer kem 3.webp "/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer đen 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer đen 3.webp">
                                                    <img class="img-loop img-hover" alt="Giày Búp Bê Slingback Đế Bệt Mũi Loafer" src="./Album cao gót/Giày búp bê slingback đế bệt mũi loafer/Giày búp bê slingback đế bệt mũi loafer đen 3.webp "/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1115586226')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">290,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/nac272" title="Giày Búp Bê Slingback Đế Bệt Mũi Loafer"> Giày Búp Bê Slingback Đế Bệt Mũi Loafer</a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>290,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
											<div class="product-img">
                                            <a href="/products/5-nac294" title="Giày Thể Thao Wonderlust" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="/Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 2.webp">
                                                    <source media="(min-width: 768px)" srcset="/Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 2.webp">
                                                    <img class="img-loop" alt="Giày Thể Thao Wonderlust" src="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 2.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 3.webp">
                                                    <img class="img-loop img-hover" alt="Giày Thể Thao Wonderlust" src="./Album cao gót/Giày thể thao wonderlust/Giày thể thao wonderlust đen 3.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1122794880')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">280,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/5-nac294" title="Giày Thể Thao Wonderlust"> Giày Thể Thao Wonderlust </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>280,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>   
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                            <a href="/products/6p-nac289" title="Cao Gót Phối Si Vân" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset=" ./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân đen 4.webp ">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân đen 4.webp ">
                                                    <img class="img-loop" alt=" SANDAL ĐẾ BỆT QUAI NGANG" src="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân đen 4.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân trắng 4.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân trắng 4.webp">
                                                    <img class="img-loop img-hover" alt=" Cao Gót Phối Si Vân" src="./Album cao gót/Giày cao gót phối si vân/Giày cao gót phối si vân trắng 4.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1118068288')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">270,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/6p-nac289" title="Cao Gót Phối Si Vân">Cao Gót Phối Si Vân</a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>270,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>                        
                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                            <a href="/products/6p-nac289" title="Sandal Đế Bệt Quai Ngang" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset=" ./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang trắng 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang trắng 3.webp">
                                                    <img class="img-loop" alt="Sandal Đế Bệt Quai Ngang" src="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang trắng 3.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang nâu 3.webp ">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang nâu 3.webp ">
                                                    <img class="img-loop img-hover" alt="Sandal Đế Bệt Quai Ngang" src="./Album cao gót/Giày sandal đế bệt quai ngang/Giày sandal hai quai ngang nâu 3.webp"/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1118068288')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">300,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/6p-nac289" title="Sandal Đế Bệt Quai Ngang">Sandal Đế Bệt Quai Ngang </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>300,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>								
                                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop animation-tran">
                                        <div class="product-block product-resize site-animation">
                                            <div class="product-img">
                                            <a href="/products/" title="GIÀY BÚP BÊ BỆT TRANG TRÍ KHÓA KIM LOẠI" class="image-resize">
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại đen 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại đen 3.webp">
													<img class="img-loop alt="Giày Búp Bê Bệt Trang Trí Kim Loại" src="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại đen 3.webp"/>
                                                </picture>
                                                <picture>
                                                    <source media="(max-width: 767px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại kem 3.webp">
                                                    <source media="(min-width: 768px)" srcset="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại kem 3.webp">
                                                    <img class="img-loop img-hover" alt="Giày Búp Bê Bệt Trang Trí Kim Loại" src="./Album cao gót/Giày búp bê bệt trang trí khoá kim loại/Giày búp bê bệt trang trí khoá kim loại kem 3.webp "/>
                                                </picture>
                                            </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" onclick="buy_now('1116304525')">
                                                    Mua ngay<i class="fa fa-long-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">265,000₫</span>
                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/products/" title="Giày Búp Bê Bệt Trang Trí Kim Loại">Giày Búp Bê Bệt Trang Trí Kim Loại</a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>265,000₫</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
				<!-- VỀ CHÚNG TÔI-->
                <div class="wrapper-home-information animation-tran">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 wrap-pd-infor wrap-flex-align flex-column box_stick">
                                <div class="box-banner-inf">
                                    <div class="content site-animation">
                                        <h2 class="title dark">Về chúng tôi</h2>
                                        <a class="button" href="gioithieu.php" title="Xem ngay">Xem ngay</a>
                                    </div>
                                </div>
                                <div class="container-background">
                                    <img src="./logo.jpg" alt="Về chúng tôi">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12  wrap-pd-infor wrap-flex-align flex-column">
                                <div class="inf-content site-animation">
                                    <p class="subtitle">LUNASHOES - Gửi Gắm Phong Cách Trong Từng Bước Chân</p>
                                    <h2>Giày Dép Nữ Hàng Đầu Việt Nam</h2>
                                    <p>Mỗi bước chân là một câu chuyện và LUNASHOES muốn giúp bạn kể câu chuyện ấy theo cách thật đặc biệt.</p>
                                    <p>Chúng tôi tự hào là thương hiệu giày luôn cập nhật những xu hướng mới nhất và làm hài lòng khách hàng để có những trải nghiệm mua sắm tốt nhất.</p>
                                    <p>Hãy đến với Lunashoes để tìm cho mình những đôi giày không chỉ đẹp mà còn "nói lên" phong cách của bạn!.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!------FOOTER------>
        <?php include('footer.php'); ?>
        <div id="site-overlay" class="site-overlay"></div>
        <script src='//theme.hstatic.net/1000378787/1000485984/14/plugins.js?v=348' type='text/javascript'></script>
        <script src='//theme.hstatic.net/1000378787/1000485984/14/scripts.js?v=348' type='text/javascript'></script>
        <script>
            setTimeout(function() {
                animation_check();
            }, 100);
            function animation_check() {
                var scrollTop = $(window).scrollTop() - 300;
                $('.animation-tran').each(function() {
                    if ($(this).offset().top < scrollTop + $(window).height()) {
                        $(this).addClass('active');
                    }
                })
            }
            $(window).scroll(function() {
                //setTimeout(function(){
                animation_check();
                //}, 500);
            })
        </script>
        <div class="sweettooth-widget" data-widget-type="tab" data-channel-key="pk_2e6f4af098bc11e9b288752e71fb539e" data-channel-customer-id="" data-digest=""></div>
        <script>
            if (typeof Haravan == undefined) {
                Haravan = {};
            }
        </script>
    </body>
</html>
