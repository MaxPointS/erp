<style>
    /* Set the size of the div element that contains the map */
    #googleMap,
    #googleMap2 {
        height: 150px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>
<!-- Footer -->
<footer id="footer" class="bg-dark dark">

    <div class="container">
        <!-- Footer 1st Row -->
        <!-- <div class="footer-first-row row">
          <div class="col-lg-3 text-center">
              <a href="http://alkadisweets.com/"><img src="http://alkadisweets.com/assets/img/hesabe.png" alt="" width="258" class="mt-2 mb-5"></a>
          </div>
          <div class="col-lg-3">
              <h5 class="title footer-subtitle mb-0">فرع العارضيه</h5>
              <ul class="list-posts">
                  <li>
                      <span class="date footer-sub-sub-title">شارع محمد نزال المعصب، العارضية، الكويت</span>
                  </li>
                  <li>
                      <div>
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3479.4737003447217!2d47.91299831509765!3d29.297777382160024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf095727f3b641%3A0xbe69d77e8feb4272!2sAlkadi%20sweetz!5e0!3m2!1sen!2sin!4v1566898794504!5m2!1sen!2sin"
                              width="100%" height="220" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
                  </li>
              </ul>
          </div>
          <div class="col-lg-3">
              <h5 class="title footer-subtitle mb-0">فرع المهبوله</h5>
              <ul class="list-posts">
                  <li>
                      <span class="date footer-sub-sub-title">سالم الصبا، الكويت</span>
                  </li>
                  <li>
                      <div>
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3484.218663370137!2d48.11920111509461!3d29.15822798221337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf090ac0f7323b%3A0x3c088b132162f670!2z2K3ZhNmI2YrYp9iqINin2YTZg9in2K_ZiiBBbCBLYWRpIFN3ZWV0cw!5e0!3m2!1sen!2sin!4v1566898995234!5m2!1sen!2sin"
                              width="100%" height="220" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
                  </li>
              </ul>
          </div>
          <div class="col-lg-3">
              <h5 class="title footer-subtitle mb-5">معلومات</h5>
              <ul class="list-posts">
                  <li>
                      <span class="title">ساعات العمل:</span>
                      <span class="date">من 7:00 صباحًا إلى 11:00 مساءً</span>
                  </li>
                  <li>
                      <span class="title">دعم العملاء</span>
                      <span class="date">24573554 </span>
                  </li>
                  <li>
                      <span class="title">البريد الإلكتروني</span>
                      <span class="date">contact@alkadi.com</span>
                  </li>
                  <li>
                      <a href="https://api.whatsapp.com/send?phone=96566095323" target="_blank" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-whatsapp"></i></a>
                      <a href="https://www.instagram.com/alkadisweetz" target="_blank" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                  </li>
              </ul>
          </div>
      </div> -->
        <!-- Footer 2nd Row -->
        <div class="footer-second-row text-center">
            <span class="text-muted"> <a href="https://www.facebook.com/MahmoudAZaid.EG" target="_blank"> <i class="ti ti-world"></i> Powered
                    By Eng. Mahmoud A. Zaid </a> </span>
        </div>
    </div>

    <!-- Back To Top -->
    <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

</footer>
<!-- Footer / End -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ9PnNW3s3rDPRr50Te5mpmsvtf6rNDZo"></script>
<script>
    var myCenter = new google.maps.LatLng(51.059955, -114.211807);
    var myCenter2 = new google.maps.LatLng(50.9156772, -113.9640719);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter,
            animation: google.maps.Animation.DROP,
            icon: 'http://www.fergusandbix.com/images/FB-pin.png'
        });
        marker.setMap(map);

        var mapProp2 = {
            center: myCenter2,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP2
        };
        var map = new google.maps.Map(document.getElementById("googleMap2"), mapProp2);
        var marker = new google.maps.Marker({
            position: myCenter2,
            animation: google.maps.Animation.DROP,
            icon: 'http://www.fergusandbix.com/images/FB-pin.png'
        });
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script> -->

</div>

<!-- Panel Cart -->

<!-- Panel Mobile -->
<nav id="panel-mobile">
    <div class="module module-logo bg-light light">
        <a href="">
            <img src="{{ asset('imgs/logo1.png') }}" alt="" width="128">
        </a>
        <button class="close" data-toggle="panel-mobile"><i class="fa fa-close"></i></button>
    </div>

{{-- here will move top nav to be onside --}}
    <nav class="module module-navigation">

    </nav>

    <div class="module module-social">
        <h6 class="text-sm mb-3">تابعنا!</h6>
        <a href=""
            target="_blank" class="icon icon-social icon-circle icon-sm icon-facebook"><i
                class="fa fa-facebook"></i></a>
        <a href="" target="_blank"
            class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        <a href="" target="_blank"
            class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-twitter"></i></a>
    </div>
</nav>

<!-- Body Overlay -->
<div id="body-overlay"></div>
</div>



<div id="toast-container" style="display: none;" class="toast-bottom-right">
    <div class="toast toast-success" aria-live="polite" style="">
        <div class="toast-message">تم إضافة الاصناف إلى سلة المشتريات</div>
    </div>
</div>
{{-- ------------------------------------------------------------------------------------------------------------------------------------ --}}







<div id="panel-cart" class="">
    <div class="panel-cart-container">
        <div class="panel-cart-title">
            <h5 class="title">{{ trans('frontFooter.cart') }}</h5>
            <button class="close" data-toggle="panel-cart"><i class="fa fa-close"></i></button>
        </div>
        <div class="panel-cart-content text-md">

            {{-- @if (session()->has('cart')) --}}
            <table class="table-cart ">
                <tbody id="CartTableBody">
                    <?php $sum = 0; ?>
                    @if ($cart->count() > 0)
                        @foreach ($cart as $item)
                            <tr>
                                <td class="cart-qty">
                                    <div class="row text-md">
                                        <span onclick="RemoveQtyFromCart(this)" uuid="{{ $item->service_id }}"
                                            productqty="{{ $item->qty }}" productPrice="{{ $item->totalprice}}"
                                            producttotalprice="{{ round($item->totalprice * $item->qty,3 ) }}"
                                            class="remove_item order-qty-btn sub-qty"><i
                                                class="fa fa-minus-circle"></i></span>

                                        &nbsp;&nbsp;
                                        <strong class="order-item-qty"
                                            id="Qty_Pro_{{ $item->service_id }}">{{ $item->qty }}</strong>
                                        &nbsp;&nbsp;

                                        <span onclick="AddQtyToCart(this)" uuid="{{ $item->service_id }}"
                                            productqty="{{ $item->qty }}" productPrice="{{ $item->totalprice}}"
                                            producttotalprice="{{ round($item->totalprice * $item->qty,3 ) }}"
                                            class="remove_item order-qty-btn add-qty"><i
                                                class="fa fa-plus-circle"></i></span>

                                        {{-- <span onclick="AddQtyToCart(this)" uuid="{{ $item['uuid'] }}"
                                            productqty="{{ $item['Qty'] }}" productPrice="{{ $item['Price'] }}"
                                            producttotalprice="{{ $item['TotalPrice'] }}"
                                            class="remove_item order-qty-btn add-qty"><i
                                                class="fa fa-plus-circle"></i></span> --}}


                                    </div>
                                </td>
                                <td class="title">
                                    <span class="name"><a href="#">
                                    @if (App::islocale('ar'))
                                        {{$item->services->first()->arname}}
                                    @else
                                    {{$item->services->first()->name}}
                                        
                                    @endif
                                        
                                    </a></span>
                                </td>
                                <td class="price">
                                    <span
                                        id="TotalPrice_Pro_{{ $item ->service_id }}">{{round($item->services->first()->price * $item->qty,3 ) }}
                                    </span>
                                </td>
                                <td class="actions">
                                    <a href="#" onclick="DeleteFromCart(this)"
                                        uuid="{{ $item->service_id }}" productqty="{{ $item->qty }}"
                                        productPrice="{{ $item->services->first()->price }}"
                                        producttotalprice="{{ $item->totalprice}}"
                                        class="action-icon btn-remove text-danger" ><i class="ti ti-close"></i></a>
                                        {{-- data-checkout="yes"value="09fe876453489db0ab4f7ba73fcc0f6d" --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
            <div class="cart-summary @if  ($cart->count()==0) d-none @endif" id="cart-summaryEmpty">
                <div class="row">
                    <div class="col-7 text-right text-muted">{{ trans('frontHeader.Amount') . ' :' }}
                    </div>
                    <div class="col-5"><strong id="cartsubTotal">
                            {{-- @php
                                $totalcartPrice = 0;
                            @endphp
                            @if (session()->has('cart'))
                                @foreach (session()->get('cart') as $item)
                                    @php
                                        $totalcartPrice += $item['TotalPrice'];
                                    @endphp
                                @endforeach
                                {{ number_format($totalcartPrice, 3, '.', '') }}

                            @endif
                            {{ number_format((float) $sum, 3) }} --}}
                            {{$subtotalAmount}}
                        </strong></div>
                </div>
                <div class="row">
                    <div class="col-7 text-right text-muted">{{ trans('frontHeader.delvCost') . ' :' }}
                    </div>
                    <div class="col-5"><strong id="cartDelv">{{ session()->get('DelvCost') }}</strong></div>
                </div>
                <hr class="hr-sm">
                <div class="row text-lg">
                    <div class="col-7 text-right text-muted">{{ trans('frontHeader.TotalPrice') . ' :' }}
                    </div>
                    <div class="col-5"><strong id="cart_total">
                        {{$subtotalAmount}}

                            {{-- {{ number_format($totalcartPrice + floatval(session()->get('DelvCost')), 3, '.', '') }} --}}
                            {{-- {{ number_format((float) $sum + floatval(session()->get('DelvCost')), 3) }} --}}

                        </strong>
                    </div>
                </div>
                <hr class="mb-3">
                <div class="row ">
                    <!-- <div class="col-12">General Note</div> -->
                    <div class="col-12">
                        <textarea cols="30" name="Commets" id="modal-comment-textarea" rows="2" class="form-control"
                            placeholder="{{ trans('frontHeader.Comments') . '(' . trans('frontHeader.optionalField') . ')' }}"></textarea>
                    </div>
                </div>
            </div>
            {{-- @else --}}
            <div class="page-content @if ($cart->count()>0) d-none @endif " id="CartEmpty">
                <p class="text-center">{{ trans('frontFooter.emptyCart')}}</p>
            </div>
            {{-- @endif  --}}
        </div>
    </div>


    <div class="panel-cart-action ">
        
        {{-- ------------------------------------------------------------------------------------------------------------------------ --}}
        {{-- <div style="width:42%;float:right" class="text-center">
            <a href="{{ url('/Registration-Login') }}" id="go-to-checkout"
                class="btn btn-outline-secondary text-center btn-md">
                
                <span>{{ trans('frontFooter.customerLogin') }}</span>
            </a>
        </div>
        <div style="width:8%;float:right" class="text-center">OR</div> --}}

        <div class="text-center ">
            <a href="{{ route('customerCart') }}" id="go-to-checkout" class="btn btn-secondary text-center btn-md w-75">
                <span class=" w-100">{{ trans('frontFooter.submitService') }}</span>
            </a>
        </div>
    </div>
</div>







{{--  style="display: block; padding-right: 17px;" productModal --}}
{{-- <div class="modal fade show" id="productModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image modal-dish-image" style="background-image: url(&quot;http://alkadisweets.com/admin/uploads/restaurantimages/restaurant_categories/items/bh8qy.55&quot;)">
                    <div class="trans-layer">
                        <img style="visibility:hidden" src="http://alkadisweets.com/assets/img/photos/modal-add.jpg" alt="">
                    </div>
                </div>
                <h4 class="modal-title modal-product-title"><br><span class="text-md"> </span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
            </div>
            <div class="modal-body panel-details-container">
                <div class="panel-details-attributes"><input name="item_id" id="attr_item_id" type="hidden" value="58"><input name="item_name" id="attr_item_name" type="hidden" value="اعواد قرص العقيلي"><input name="item_price" id="attr_item_price" type="hidden" value="8.500"><input name="item_multi_select" id="attr_item_multi_select" type="hidden" value="undefined"><input name="rest_id" id="attr_rest_id" type="hidden" value="1"></div>
            </div>
            <div class="col-sm-12 mb-0">
                <textarea cols="30" id="modal-comment-textarea" rows="2" class="form-control" placeholder=""></textarea>
            </div>
            <div class="row mb-3 text-xlg">
                <div class="col-sm-12 text-center mt-3">
                    <a href="#" class="modal-sub-qty"><i class="fa fa-minus-circle"></i></a>
                    &nbsp;&nbsp;
                 <!--  <strong class="modal-qty-text">1</strong> -->
                    &nbsp;&nbsp;
                    <a href="#" class="modal-add-qty"><i class="fa fa-plus-circle"></i></a> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" id="add-cart-button" data-attr_item_price="8.500" data-attr_item_name="اعواد قرص العقيلي" data-attr_item_id="58" class="btn btn-primary add-attribute-to-cart"><span>أضف إلى السلة</span></button>
                </div>

            </div>
        </div>
    </div>
</div>  --}}

<!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->



{{-- <div class="modal fade" id="contactModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-right">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="" alt=""></div>
                <h4 class="modal-title">
                    دعم العملاء <br>
                    <a href="tel:69992974">يتصل <b>69992974</b></a>
                    <br>
                    <a href="mailto:contact@alkadi.com">البريد الإلكتروني <b>contact@alkadi.com</b></a>

                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="ti-close"></i></button>
            </div>
        </div>
    </div>
</div> --}}

<!-- Modal / Login -->
{{-- <div class="modal fade" id="loginModal" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content text-right">
          <div class="modal-header modal-header-lg dark bg-dark">
              <div class="bg-image"><img src="" alt=""></div>
              <h4 class="modal-title">تسجيل الدخول</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
          </div>
          <div class="modal-body">
              <form name="" id="login" method="POST" action="" class="validate-form">
                  <div class="form-group">
                      <label>البريد الإلكتروني:</label>
                      <input type="email" required name="email" class="form-control" >
                  </div>
                  <div class="form-group">
                      <label>كلمه السر:</label>
                      <input type="password" required name="password" class="form-control" >
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6" >
                          <div class="form-group">
                              <label class="custom-control custom-checkbox">
                                  <input type="checkbox" value="1" name="remember" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">تذكر حسابي</span>
                              </label>
                          </div>
                      </div>
                      <div class="col-md-6 text-right" >
                          <a href="" >
                          هل نسيت كلمة المرور؟          
                          </a>
                      </div>
                  </div>
                  <br>
                  <div class="text-center">
                      <button type="button" class="btn btn-dark" data-dismiss="modal"><span>إلغاء</span></button>
                      <button type="submit" class="btn btn-primary"><span>تسجيل الدخول</span></button>
                      <br><br>
                      عميل جديد؟<a href=""><b>إنشاء حساب</b></a>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div> --}}




{{-- <script src="{{asset('dist/js2/js23.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js2/js24.js')}}"></script> --}}


{{-- <script>
    var slideIndex = 0;
    window.onload = function() {
        //setTimeout();
        setInterval(changeImage, 5000);

        var imgs //= document.getElementsByTagName("img");

        imgs = [
            'http://localhost:81/sweets-shop/public/images/backg.jpeg',
            'http://localhost:81/sweets-shop/public/images/Products/5fd8d05951ccc5fd8d05951ccf.jpeg',
            'http://localhost:81/sweets-shop/public/images/Products/5fd8d0e2048645fd8d0e204867.jpeg',
            'http://localhost:81/sweets-shop/public/images/Products/5fd8d1b06fca65fd8d1b06fca8.jpeg',
            'http://localhost:81/sweets-shop/public/images/Products/5fd8d6c7cf46f5fd8d6c7cf471.jpeg',
        ];
        var slides = document.getElementsByClassName("mySlides");
        // slides[0].style.backgroundImage  = "url('"+imgSrc()+"')";  

        function changeImage() {
            var i = Math.floor((Math.random() * 3));

            slides[0].style.backgroundImage = "url('" + imgs[i] + "')";

        }
    }

    
</script> --}}

