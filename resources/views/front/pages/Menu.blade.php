@extends('front.layout.master')


@section('css')
    <style>
        .modal-body .close {
            position: absolute;
            top: 0;
            left: 0;
            color: white;
            font-size: 10px;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .modal-body .close:hover {
            background-color: #555;
        }
    </style>
@endsection



@section('services')
    <div class="page-title header-mt-10 rest-cover zooming mySlides"
        style="background-image: url('{{ asset('images/backg.jpeg') }}');height:320px;margin-top:50px">
    </div>


    <div class="page-content">
        <div class="container">

            <div class="row no-gutters">
                <div class="col-md-4 hidden-sm">
                    <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                        <ul class="nav nav-menu bg-dark dark">
                            @foreach ($companiesWithServices as $service)
                                @if (App::islocale('en'))
                                    <li><a href="#menuservice{{ $service->uuid }}">{{ $service->name }}</a></li>
                                @else
                                    <li><a href="#menuservice{{ $service->uuid }}">{{ $service->arname }}</a></li>
                                @endif
                            @endforeach

                        </ul>

                    </nav>
                </div>
                <div class="col-md-6 "
                    @if (App::islocale('ar')) style="margin-right: 20px" 
                @else
                style="margin-left: 20px" @endif
                    id="menu_items_view">


                    <!---->


                    <!---->



                    <!---->
                    @foreach ($companiesWithServices as $company)
                        <div id="menuservice{{ $company->uuid }}" class="menu-service">
                            <div class="menu-service-title collapse-toggle" role="tab"
                                data-target="#menu{{ $company->uuid }}Content" data-toggle="collapse" aria-expanded="true">
                                <h4 class="title"><b style="color:#87226b">

                                        @if (App::islocale('en'))
                                            {{ $company->name }}
                                        @else
                                            {{ $company->arname }}
                                        @endif
                                    </b></h4>
                            </div>
                            <div id="menu{{ $company->uuid }}Content" class="menu-service-content padded collapse show">
                                <div class="row gutters-sm">

                                    @foreach ($company->services as $service)
                                        <div class="col-lg-4 col-6">

                                            <!-- Menu Item `products`.`MenuSort` ASC -->
                                            <div class="menu-item menu-grid-item">
                                                <img style="display:none;" class="mb-4 override-img"
                                                    id="imgsrc{{ $service->uuid }}" imgs="{{ $service->Image }}"
                                                    src="{{ asset('images') . '/' . $service->Image }}" width="60%"
                                                    alt="">
                                                <img id="imageresource" class="mb-4 item-image"
                                                    data-itemName="  @if (App::islocale('en')) {{ $service->name }}  @else  {{ $service->arname }} @endif "
                                                    data-itemDesc="{{ $service->ardescription }}"
                                                    src="{{ asset('images') . '/' . $service->Image }}" width="100%"
                                                    alt="">
                                                <h6 id="productname{{ $service->uuid }}" class="mb-1">
                                                    @if (App::islocale('en'))
                                                        {{ $service->name }}
                                                    @else
                                                        {{ $service->arname }}
                                                    @endif
                                                </h6>

                                                @if (App::islocale('en'))
                                                    {{-- {{$service->description}}  --}}
                                                    <span class="text-muted text-sm">
                                                        @if (Str::length($service->description) > 0)
                                                            {{ Str::limit($service->description, 10) }}
                                                    </span>
                                                    <a href="{{route('showservicedetails',$service->uuid)}}" class="text-muted text-sm read-more">{{ trans('frontHeader.readmore') }}</a>
                                                @else
                                                    <span class="text-muted text-sm">
                                                        {{ $service->description }}
                                                    </span>
                                                @endif
                                            @else
                                                {{-- {{$service->arname}}  --}}
                                                <span class="text-muted text-sm">
                                                    @if (Str::length($service->ardescription) > 0)
                                                        {{ Str::limit($service->ardescription, 10) }}

                                                </span>
                                                <a href="{{route('showservicedetails',$service->uuid)}}" class="text-muted text-sm read-more">{{ trans('frontHeader.readmore') }}</a>
                                                
                                            @else
                                                <span class="text-muted text-sm">
                                                    {{ $service->ardescription }}
                                                </span>
                                    @endif
                    @endif
                    <div class="row align-items-center mt-2">
                        <div class=" col-sm-6">
                            <span class="text-md ml-4 "> <del
                                    style="text-align: center;"><i>{{ $service->priceBefore }}KD</i></del></span>
                            <span class="text-md ml-4 ">{{ $service->price }}KD</span>
                        </div>

                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                            <button class="btn btn-outline-secondary btn-sm add-cart-modal" onclick="setModelData(this)"
                                productName="@if (App::islocale('en')) {{ $service->name }}  @else  {{ $service->arname }} @endif"
                                prodesc="@if (App::islocale('en')) {{ $service->description }}  @else  {{ $service->ardescription }} @endif"
                                uuid="{{ $service->uuid }}" item_price="{{ $service->price }}"
                                item_total_price="{{ $service->price }}" item_Qty="1" data-toggle="modal"
                                data-target="#serviceModal"><span>{{ trans('frontHeader.addtocart') }}</span></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>{{-- row --}}
    </div>
    </div>
    @endforeach
    </div>
    </div>
    </div>{{-- contaner --}}
    </div>

    <div class="modal fade" id="serviceModal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-lg dark bg-dark">
                    <div class="bg-image modal-dish-image">
                        <div class="trans-layer">
                            <img id="imgModel" src="" alt="">
                        </div>
                    </div>
                    <h4 class="modal-title modal-product-title"></h4>
                      
                            <h6 class="mt-1 mb-0"></h6>
                       
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                            class="ti-close"></i></button>
                </div>
                <div class="modal-body panel-details-container">
                   
                    <div class="panel-details-attributes">

                    </div>
                
                </div>
                <div class="col-sm-12 mb-0">
                    {{-- <textarea cols="30" id="modal-comment-textarea" rows="2" class="form-control" placeholder="رسالة مخصصة على الكعكة"></textarea> --}}
                </div>
                <div class="row mb-3 text-xlg ">
                    <div class="col-sm-12 text-center mt-3">
                        <button class="modal-sub-qty- btn  text-warning" id="decreaseBtn"><i
                                class="fa fa-2x fa-minus-circle"></i></button>
                        &nbsp;&nbsp;
                        <strong id="modal-qty-" item_price="" class="modal-qty-text">1</strong>
                        &nbsp;&nbsp;
                        <button class="modal-add-qty- btn text-success" id="IncreaseBtn"><i
                                class="fa fa-2x fa-plus-circle"></i></button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button type="button" id="add-cart-button" onclick="SendQtyToCart()"
                            token="{{ csrf_token() }}" Product_item_price="" Product_item_Total_price=""
                            Product_item_name="" Product_item_Qty="" Product_item_id=""
                            class="btn btn-primary add-attribute-to-cart"><span>{{ trans('frontHeader.addtocart') }}</span></button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header dark bg-dark" style="border: none;">
                    <h4 class="modal-title modal-product-title preview-item-name"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                            class="ti-close"></i></button>
                </div>
                <div class="modal-body" style="padding: 0">
                    <img src="" class="preview-item-image" style="width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $("#IncreaseBtn").click(function() {

            let Qty = $("#modal-qty-").text();
            let price = $("#modal-qty-").attr("item_price");
            let intQty = parseInt(Qty);
            let floatPrice = parseFloat(price).toFixed(3);
            // alert($.type(floatPrice)  + "       "+ floatPrice);

            intQty++;
            $('#add-cart-button').attr('Product_item_Qty', intQty);
            $('#add-cart-button').attr('Product_item_Total_price', parseFloat(floatPrice * intQty).toFixed(3));
            $("#modal-qty-").text(intQty);
            // $("#modal-qty-").attr("item_price", parseFloat(floatPrice * intQty).toFixed(3));
            // alert( parseFloat( floatPrice * intQty))
        });

        $("#decreaseBtn").click(function() {


            let Qty = $("#modal-qty-").text();
            let price = $("#modal-qty-").attr("item_price");
            let intQty = parseInt(Qty);
            let floatPrice = parseFloat(price).toFixed(3);
            // alert($.type(floatPrice)  + "       "+ floatPrice);

            if (intQty < 2)
                return;

            intQty--;



            $('#add-cart-button').attr('Product_item_Qty', intQty);
            $('#add-cart-button').attr('Product_item_Total_price', parseFloat(floatPrice / intQty).toFixed(3));
            $("#modal-qty-").text(intQty);
            // $("#modal-qty-").attr("item_price", parseFloat((floatPrice / intQty)).toFixed(3));
            // alert( parseFloat( floatPrice * intQty))
        });


        function setModelData(btnData) {

            //alert($(btnData).attr("productName"));

            let imgsrc = $("#imgsrc" + $(btnData).attr('uuid')).attr('src');
            let base_url = "{{ asset('') }}";
            let imgsbg = $("#imgsrc" + $(btnData).attr('uuid')).attr('imgs');
            //let desc = //prodesc

            $(".modal-dish-image").attr("style", 'background-image: url("' + base_url + "/images/" + imgsbg +
                '")'); //modal-product-title
            $(".modal-product-title").text($("#productname" + $(btnData).attr('uuid')).text()); //

            let uuid = $(btnData).attr('uuid');
            // alert(uuid);
            let prouctName = $(btnData).attr('productName');
            let prouctprice = parseFloat($(btnData).attr('item_price')).toFixed(3);
            let producttotalprice = parseFloat($(btnData).attr('item_total_price')).toFixed(3);
            let productQty = parseInt($(btnData).attr('item_Qty'));


            $('.add-attribute-to-cart').attr('Product_item_Qty', productQty);
            $('.add-attribute-to-cart').attr('Product_item_price', prouctprice);
            $('.add-attribute-to-cart').attr('Product_item_id', uuid);
            $('.add-attribute-to-cart').attr('Product_item_Total_price', producttotalprice);
            $('.add-attribute-to-cart').attr('Product_item_name', prouctName);




            $("#modal-qty").text(productQty);
            $("#modal-qty-").text(1);
            $("#modal-qty-").attr("item_price", prouctprice * productQty);

            $("#add-cart-button").attr("Product_item_id", uuid);
            $("#add-cart-button").attr("Product_item_price", prouctprice);
            $("#add-cart-button").attr("Product_item_Qty", $("#modal-qty-").text());



            // 
            // alert($('.add-attribute-to-cart').attr('Product_item_id'));
        }

        // function IncQtyCart() {

        //     let Qty = $("#modal-qty-").text();
        //     let intQty = parseInt(Qty);
        //     if ($.type(intQty) != 'Number' || intQty < 1);
        //     return;

        //     intQty++;
        //     // $('#add-cart-button').attr('Product_item_Qty', intQty);
        //     // $('#add-cart-button').attr('Product_item_Total_price', prouctprice * intQty);
        //     alert(intQty);

        // }

        // function DecQtyCart() {
        //     let Qty = parseInt($("#modal-qty").text());
        //     if (Number.isNaN(Qty) || Qty === 1) {
        //         return;
        //     } else {

        //         Qty--;

        //         $('#add-cart-button').attr('Product_item_Qty', Qty)
        //         $('#add-cart-button').attr('Product_item_Total_price', Qty)
        //         $("#modal-qty").text(Qty);
        //     }
        // }

        function SendQtyToCart() {

            // let productqty = parseInt($('#add-cart-button').attr('Product_item_Qty'));
            // let productPrice = parseFloat($('#add-cart-button').attr('Product_item_price')).toFixed(3);
            // let uuid = parseInt($('#add-cart-button').attr('Product_item_id'));
            // let productName =   $('#add-cart-button').attr('Product_item_name');
            // let productTotalPrice = parseFloat(productPrice * productqty).toFixed(3);
            // let token = $('#add-cart-button').attr('token') ;


            // let productqty = parseInt($('.add-attribute-to-cart').attr('Product_item_Qty'));
            // let productPrice = parseFloat($('.add-attribute-to-cart').attr('Product_item_price')).toFixed(3);
            // let uuid = parseInt($('.add-attribute-to-cart').attr('Product_item_id'));
            // let productName = $('.add-attribute-to-cart').attr('Product_item_name');
            // let productTotalPrice = parseFloat(productPrice * productqty).toFixed(3);
            let token = $('.add-attribute-to-cart').attr('token');

            // let txtsubTotal = $("#cartsubTotal").text(); //
            // let txtCartTotal = $("#cart_total").text(); //
            // let txtDelvPrice = parseFloat($("#cartDelv").text()).toFixed(3);
            //let delvCost = parseFloat($("#cartDelv").text()).toFixed(3); 

            let uuidService = $("#add-cart-button").attr("Product_item_id");
            let QtyService = $("#add-cart-button").attr("Product_item_Qty");
            let ServicePrice = $("#add-cart-button").attr("Product_item_price");
            // let ServicePrice = $("#add-cart-button").attr("Product_item_price");

            $.ajax({
                type: "POST",
                url: "{{ route('addtocart') }}",
                data: {
                    _token: token,
                    // proid: uuid,
                    // proprice: productPrice,
                    // proname: productName,
                    // proqty: productqty,
                    // prototalprice: productTotalPrice
                    ServiceID: uuidService,
                    ServiceQty: QtyService,
                    price: ServicePrice,
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let CartCurrentPrice = parseFloat($("#cart-value").text()) ? parseFloat($("#cart-value")
                        .text(), 3) : 0.000;
                    $(".cart-count").text(parseInt(response.length));
                    let sum=0.0;
                    $.each(response[0],function(key,item){
                        sum+=item.TotalPrice ;
                    });
                    $(".cart-value").text(parseFloat(sum).toFixed(3));

                    $("#serviceModal").modal("hide");

                    if (response != null) {
                        console.log(Object.keys(response).length);
                        // alert("asdjhasjdh");
                        // $("#CartTableBody").empty();
                        // console.log(Object.keys(response).length);

                        //     $.each(response, function(element) {

                        //         $("#CartTableBody").append(
                        //             '<tr><td class="cart-qty"><div class="row text-md">' +
                        //             '<span onclick="RemoveQtyToCart(this)" uuid="' + element
                        //             .uuid + '" productqty="' + element.qty + '" productPrice="' +
                        //             element.Price + '" producttotalprice="' + element.TotalPrice +
                        //             '" class="remove_item order-qty-btn sub-qty"><i class="fa fa-minus-circle"></i></span>  &nbsp;&nbsp;' +
                        //             '<strong class="order-item-qty" id="Qty_Pro_' + element.uuid +
                        //             '">' + element.qty +
                        //             '</strong> &nbsp;&nbsp; <span onclick="AddQtyToCart(this)" uuid="' +
                        //             element.uuid + '" productqty="' + element.Qty +
                        //             '" productPrice="' + element.Price + '" producttotalprice="' +
                        //             element.totalprice +
                        //             '" class="remove_item order-qty-btn add-qty"><i class="fa fa-plus-circle"></i></span>' +
                        //             '</div></td>' +
                        //             '<td class="title"><span class="name"><a href="#">' +
                        //             element.name +
                        //             '</a></span></td>' +
                        //             '<td class="price"><span id="TotalPrice_Pro_' + element.uuid +
                        //             '">' + parseFloat(element.totalprice) + '</span></td>' +
                        //             '<td class="actions"> <a href="#" onclick="DeleteFromCart(this)" uuid="' +
                        //             element.uuid + '" productqty="' + element.Qty +
                        //             '" productPrice="' + element.Price + '" producttotalprice="' +
                        //             element.TotalPrice +
                        //             '" class="action-icon btn-remove text-danger" data-checkout="yes"><i class="ti ti-close"></i></a></td>' +
                        //             '</tr>');
                        //          });

                    }
                    $("#CartTableBody").load(location.href + " #CartTableBody");
                    $("#cart-summaryEmpty").load(location.href + " #cart-summaryEmpty");
                    // $("#cart-count").load(location.href + " #cart-count");

                    
                    // $("#cart_total").load(location.href + "#cart_total");
                    // $("#cart-summaryEmpty").load(location.href + "#cart-summaryEmpty");

                    $("#panel-cart").addClass("show");
                    // $("#cart_total").text(parseFloat(response.CartTotalPrice).toFixed(3));
                    $("#cart-summaryEmpty").removeClass("d-none");
                    $("#CartEmpty").addClass("d-none");

                    //
                    toastr.success("تم اضافة المنتج لسلة المشتريات");

                    //$("#panel-cart").addClass("show").removeClass("show",3000);
                    //$("#toast-container").modal().show().fadeout(1000);
                },
                error: function(err) {
                    console.log(err);
                }
            });

            // let cartqty=parseInt($("#cart-count").text());
            // let cartval= parseFloat($("#cart-value").text()).toFixed(3);
            // $(".cart-count").text(parseInt(cartqty)+1);
            // $(".cart-value").text(parseFloat(cartval + parseFloat(productTotalPrice)).toFixed(3));
            // $("#serviceModal").modal("hide");
            // alert( productTotalPrice );
        }
    </script>

    <script>
        // var slideIndex = 0;
        // window.onload = function() {
        //     //setTimeout();
        //     setInterval(changeImage, 5000);

        //     var imgs = document.getElementsByTagName("img");
        //     var slides = document.getElementsByClassName("mySlides");
        //     // slides[0].style.backgroundImage  = "url('"+imgSrc()+"')";  

        //     function changeImage() {
        //         var i = Math.floor((Math.random() * 20));
        //         slides[0].style.backgroundImage = "url('" + imgs[i].src + "')";

        //     }
        // }
    </script>





@endsection