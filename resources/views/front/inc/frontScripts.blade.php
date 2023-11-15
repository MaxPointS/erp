<script src="{{ asset('/dist/js2/jquery.js') }}"></script>
<script src="{{ asset('/dist/js2/tether.min.js') }}"></script>
<script src="{{ asset('/dist/js2/bootstrap.js') }}"></script>
<script src="{{ asset('/dist/js2/slick.min.js') }}"></script>
<script src="{{ asset('/dist/js2/jquery.appear.js') }}"></script>
<script src="{{ asset('/dist/js2/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('/dist/js2/jquery.localScroll.min.js') }}"></script>
<script src="{{ asset('/dist/js2/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/dist/js2/jquery.mb.YTPlayer.min.js') }}"></script>
<script src="{{ asset('/dist/js2/twitterFetcher_min.js') }}"></script>
<script src="{{ asset('/dist/js2/skrollr.min.js') }}"></script>
<script src="{{ asset('/dist/js2/animsition.min.js') }}"></script>
<script src="{{ asset('/dist/js2/toastr.min.js') }}"></script>
<script src="{{ asset('/dist/js2/timepicker.js') }}"></script>
<script src="{{ asset('/dist/js2/select2.full.min.js') }}"></script>
<script src="{{ asset('/dist/js2/jquery.datetimepicker.full.min.js') }}"></script>

<!-- JS Core -->
<script src="{{ asset('/dist/js2/core.js') }}"></script>
<script src="{{ asset('/dist/js2/custom1.js') }}"></script>
{{-- <script src="{{ asset('/dist/js2/custom1.js') }}"></script> --}}
<script src="{{ asset('/dist/js2/formValidation.js') }}"></script>
<script src="{{ asset('/dist/js2/bootstrap.min.js') }}"></script>
<script src="{{ asset('/dist/js2/validation.js') }}"></script>
<script src="{{ asset('/dist/js2/my_account.js') }}"></script>
<script src="{{ asset('/dist/js2/cartactions.js') }}"></script>


{{-- @yield('script') --}}

<script>
    $(document).ready(function() {
        let submitFormLink = document.getElementById('submitFormLink');
        $("#submitFormLink").click(function(e) {
            e.preventDefault();
            $('#changeLangForm').submit();
        });
    });
</script>




<script>
    toastr.options = {
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "preventDuplicates": true
    };

    $('.select2').select2();

    $('#guest_email').on('keyup', function() {
        $("#guest_email").prop('required', false);
        if ($('#guest_email').val()) {
            $("#guest_email").prop('required', true);
        }
    });

    $(document).on("click", "#imageresource", function(e) {
        e.preventDefault();
        var str = $(this).attr('src');
        var res = str.replace("icons", "items");
        $('.preview-item-image').attr('src', res);

        var itemName = $(this).attr('data-itemName');
        var itemDesc = $(this).attr('data-itemDesc');
        if (!itemDesc || itemDesc === 0) {
            $('.preview-item-name').html(itemName);
        } else {
            var itemDeschtml = '<h6 class="mt-1 mb-0">' + itemDesc + '</h6>'
            $('.preview-item-name').html(itemName + '<br>' + itemDeschtml);
        }
        $('#previewModal').modal('show');
    });





    // function RemoveQtyToCart(item) {

    //     let uuid = $(item).attr('uuid');
    //     let productQty = $(item).attr('productqty');
    //     let productTotal = $(item).attr('producttotalprice');
    //     let txtPricePro = $(item).attr('productPrice');
    //     let tokens = "{{ csrf_token() }}";
    //     let qtyTxt = $("#Qty_Pro_" + uuid).text();
    //     let txtTotalPricePro = $("#TotalPrice_Pro_" + uuid).text();
    //     let txtsubTotal = $("#cartsubTotal").text(); //
    //     let txtCartTotal = $("#cart_total").text(); //cart_total
    //     let txtDelvPrice = parseFloat($("#cartDelv").text()).toFixed(3);
    //     let delvCost = parseFloat($("#cartDelv").text()).toFixed(3);
    //     if (parseInt(qtyTxt) < 2) {
    //         // alert(qtyTxt)
    //         return;
    //     } else {
    //         $("#Qty_Pro_" + uuid).text(parseInt(qtyTxt) - 1);
    //         productQty = parseInt($("#Qty_Pro_" + uuid).text());
    //     }
    //     // txtTotalPricePro = parseFloat(parseFloat(txtPricePro).toFixed(3) * parseInt(productQty)).toFixed(3);
    //     // $("#TotalPrice_Pro_" + uuid).text(txtTotalPricePro);
    //     // $("#cartsubTotal").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtPricePro)).toFixed(3));
    //     // $("#cart_total").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtPricePro) + parseFloat(delvCost))
    //     //     .toFixed(3));

    //     $.ajax({
    //         type: "DELETE",
    //         url: "{{ url('/CartRemove') }}" + "/" + uuid,
    //         // method:"delete",
    //         data: {
    //             _token: tokens,
    //             proid: uuid,
    //             proqty: productQty,
    //             // prototalprice: txtTotalPricePro
    //         },
    //         dataType: "json",
    //         success: function(response) {
    //             console.log(response);
    //             $("#CartTableBody").load(location.href + " #CartTableBody");
    //             $("#cartsubTotal").load(location.href + " #cartsubTotal");
    //             $("#cart_total").load(location.href + " #cart_total");
    //             $("#cart-value").load(location.href + " #cart-value");


    //         },
    //         error: function(err) {
    //             console.log(err);
    //         }
    //     });

    // }

    function RemoveQtyFromCart(item) {

        // alert();

        let uuid = $(item).attr('uuid');
        let productQty = $(item).attr('productqty');
        let productTotal = $(item).attr('producttotalprice');
        let txtPricePro = $(item).attr('productPrice');
        let tokens = "{{ csrf_token() }}";
        let qtyTxt = $("#Qty_Pro_" + uuid).text();
        let txtTotalPricePro = $("#TotalPrice_Pro_" + uuid).text();
        let txtsubTotal = $("#cartsubTotal").text(); //
        let txtCartTotal = $("#cart_total").text(); //cart_total
        let txtDelvPrice = parseFloat($("#cartDelv").text()).toFixed(3);
        let delvCost = parseFloat($("#cartDelv").text()).toFixed(3);
        if (parseInt(qtyTxt) < 2) {
            // alert(qtyTxt)
            return;
        } else {
            $("#Qty_Pro_" + uuid).text(parseInt(qtyTxt) - 1);
            productQty = parseInt($("#Qty_Pro_" + uuid).text());
        }
        // txtTotalPricePro = parseFloat(parseFloat(txtPricePro).toFixed(3) * parseInt(productQty)).toFixed(3);
        // $("#TotalPrice_Pro_" + uuid).text(txtTotalPricePro);
        // $("#cartsubTotal").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtPricePro)).toFixed(3));
        // $("#cart_total").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtPricePro) + parseFloat(delvCost))
        //     .toFixed(3));

        $.ajax({
            type: "DELETE",
            url: "{{ url('/CartRemoveQty') }}" + "/" + uuid,
            // method:"delete",
            data: {
                _token: tokens,
                proid: uuid,
                proqty: productQty,
                // prototalprice: txtTotalPricePro
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#CartTableBody").load(location.href + " #CartTableBody");
                $("#cartsubTotal").load(location.href + " #cartsubTotal");
                $("#cart_total").load(location.href + " #cart_total");
                $("#cart-value").load(location.href + " #cart-value");


            },
            error: function(err) {
                console.log(err);
            }
        });

    }

    function AddQtyToCart(item) {
        // alert();
        let uuid = $(item).attr('uuid');
        let productQty = $(item).attr('productqty');
        let productTotal = $(item).attr('producttotalprice');
        let txtPricePro = $(item).attr('productPrice');
        let tokens = "{{ csrf_token() }}";
        let qtyTxt = $("#Qty_Pro_" + uuid).text();
        let txtTotalPricePro = $("#TotalPrice_Pro_" + uuid).text();
        let txtsubTotal = $("#cartsubTotal").text(); //
        let txtCartTotal = $("#cart_total").text(); //cart_total
        let txtDelvPrice = parseFloat($("#cartDelv").text()).toFixed(3);
        let delvCost = parseFloat($("#cartDelv").text()).toFixed(3);
        // if (parseInt(qtyTxt) < 2) {
        //     // alert(qtyTxt)
        //     return;
        // } else {
            $("#Qty_Pro_" + uuid).text(parseInt(qtyTxt) + 1);
            productQty = parseInt($("#Qty_Pro_" + uuid).text());
        // }
        // txtTotalPricePro = parseFloat(parseFloat(txtPricePro).toFixed(3) * parseInt(productQty)).toFixed(3);
        // $("#TotalPrice_Pro_" + uuid).text(txtTotalPricePro);
        // $("#cartsubTotal").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtPricePro)).toFixed(3));
        // $("#cart_total").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtPricePro) + parseFloat(delvCost))
        //     .toFixed(3));

        $.ajax({
            type: "PUT",
            url: "{{ url('/CartAddQty') }}" + "/" + uuid,
            // method:"delete",
            data: {
                _token: tokens,
                proid: uuid,
                proqty: productQty,
                // prototalprice: txtTotalPricePro
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#CartTableBody").load(location.href + " #CartTableBody");
                $("#cartsubTotal").load(location.href + " #cartsubTotal");
                $("#cart_total").load(location.href + " #cart_total");
                $("#cart-value").load(location.href + " #cart-value");
                

            },
            error: function(err) {
                console.log(err);
            }
        });

    }

    // function AddQtyToCart(item) {

    //     let uuid = $(item).attr('uuid');
    //     let productQty = $(item).attr('productqty');
    //     let productTotal = $(item).attr('producttotalprice');
    //     let txtPricePro = $(item).attr('productPrice');
    //     let tokens = "{{ csrf_token() }}";
    //     let qtyTxt = $("#Qty_Pro_" + uuid).text();
    //     let txtTotalPricePro = $("#TotalPrice_Pro_" + uuid).text();
    //     let txtsubTotal = $("#cartsubTotal").text(); //
    //     let txtCartTotal = $("#cart_total").text(); //
    //     let txtDelvPrice = parseFloat($("#cartDelv").text()).toFixed(3);
    //     let delvCost = parseFloat($("#cartDelv").text()).toFixed(3);
    //     if (parseInt(qtyTxt) < 1) {
    //         return;
    //     } else {
    //         $("#Qty_Pro_" + uuid).text(parseInt(qtyTxt) + 1);
    //         productQty = parseInt($("#Qty_Pro_" + uuid).text());

    //     }
    //     txtTotalPricePro = parseFloat(parseFloat(txtPricePro).toFixed(3) * parseInt(productQty)).toFixed(3);


    //     $("#TotalPrice_Pro_" + uuid).text(txtTotalPricePro);
    //     $("#cartsubTotal").text(parseFloat(parseFloat($("#cartsubTotal").text()) + parseFloat(txtPricePro)).toFixed(3));
    //     $("#cart_total").text(parseFloat(parseFloat($("#cartsubTotal").text()) + parseFloat(delvCost)).toFixed(3));
    //     // $("#cart-value").text($("#cart_total").text());
    //     $.ajax({
    //         type: "PUT",
    //         url: "{{ url('/CartOrders') . '/' }}" + uuid,
    //         data: {
    //             _token: tokens,
    //             proid: uuid,
    //             proqty: productQty,
    //             prototalprice: txtTotalPricePro
    //         },
    //         dataType: "json",
    //         success: function(response) {
    //             console.log(response);
    //         },
    //         error: function(err) {
    //             console.log(err);
    //         }
    //     });

    // }

    function DeleteFromCart(item) {
        let uuid = $(item).attr('uuid');
        let productQty = $(item).attr('productqty');
        let productTotal = $(item).attr('producttotalprice');
        let txtPricePro = $(item).attr('productPrice');
        let tokens = "{{ csrf_token() }}";
        let qtyTxt = $("#Qty_Pro_" + uuid).text();
        let txtTotalPricePro = $("#TotalPrice_Pro_" + uuid).text();
        let txtsubTotal = $("#cartsubTotal").text(); //
        let txtCartTotal = $("#cart_total").text(); //cart_total
        let txtDelvPrice = parseFloat($("#cartDelv").text()).toFixed(3);
        let delvCost = parseFloat($("#cartDelv").text()).toFixed(3);


        productQty = parseInt($("#Qty_Pro_" + uuid).text());
        txtTotalPricePro = parseFloat(parseFloat(txtPricePro).toFixed(3) * parseInt(productQty)).toFixed(3);
        $("#TotalPrice_Pro_" + uuid).text(txtTotalPricePro);

        $("#cartsubTotal").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtTotalPricePro)).toFixed(3));

        $("#cart_total").text(parseFloat(parseFloat(txtsubTotal) - parseFloat(txtTotalPricePro) + parseFloat(delvCost))
            .toFixed(3));

        $.ajax({
            type: "DELETE",
            // url: "{{ url('/CartOrders') . '/' }}" + uuid,
            url:  "{{url('/delete')}}" + "/" + uuid,
            data: {
                _token: tokens,
                proid: uuid,
                proqty: productQty,
                prototalprice: txtTotalPricePro
            },
            dataType: "json",
            success: function(response) {
                
                // $(item).parents("tr").remove();

                // $(".cart-count").text(parseInt(response.CartLenth));
                // if (parseInt(response.CartLenth) === 0) {
                //     location.href = "./";
                // }
                console.log(response);
                $("#CartTableBody").load(location.href + " #CartTableBody");
                $("#cartsubTotal").load(location.href + " #cartsubTotal");
                $("#cart_total").load(location.href + " #cart_total");
                $("#cart-value").load(location.href + " #cart-value");
                $("#cart-count").load(location.href + " #cart-count");


                $("#cart-count").text(parseInt(response.CartLenth));
                // if (response.length == 0) {
                    location.reload() ;
                // }

                //console.log(response);
            },
            error: function(err) {
                console.log(err);
            }
        });



    }
</script>



