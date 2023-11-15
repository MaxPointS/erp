$(document).ready(function() {
  //   var base_url = "http://localhost/GrabLugmah/Alkadi/en/";
  //   var base_url = 'http://al-kadi.grablugmah.com/en/';
    //  var base_url = 'http://alkadisweets.com/en/';
    var base_url='http://localhost/erpi/public' ;
     $(document).on("click", ".about-us-li", function(e) {
      $('#panel-mobile').removeClass('show');
      $('#body-overlay').fadeOut(400);
    });
    
    $('input[name="delivery_pickup_option"]').on('change', function() {     
          if($(this).val() == "delivery") {
              //area
              $('#choose_area').show();
              setTimeout(function(){
                  $('#choose_area').removeClass('hide');    
              }, 300);
  
              //branch
              $('#choose_branch').addClass('hide');
              $('#choose_branch').fadeOut(200);
              
          }else{
              
              //area
              $('#choose_area').addClass('hide');
              $('#choose_area').fadeOut(200);
  
              //branch
              $('#choose_branch').show();
              setTimeout(function(){
                  $('#choose_branch').removeClass('hide');    
              }, 300);
          }
    });
  
    $(".delivery-pickup-form").submit(function() {
      var delivery = $.trim($(".delivery_pickup_option:checked").val());
      var area = $.trim($("select[name='area']").val());
      var branch = $.trim($("select[name='restaurant_branch']").val());
  
      // Check if empty of not
      if (delivery === "") {
        alert("please choose delivery/pickup");
        return false;
      }
      if (delivery == "delivery") {
        if (area === "") {
          alert("please choose the area");
          return false;
        }
      }
      if (delivery == "pick_up") {
        if (branch === "") {
          alert("please choose the branch");
          return false;
        }
      }
    });
  
    $("#area_select").change(function() {
      update_cart_by_area($(this).val());
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
  
    $(document).on("click", ".modal-sub-qty", function(e) {
      e.preventDefault();
      curr_qty = $(".modal-qty-text").text();
      curr_qty--;
      if (curr_qty >= 1) {
        $(".modal-qty-text").text(curr_qty);
      }
    });
//--------------------------------------------------------------------------------------------------------------------------------------------//
    $(document).on("click", ".modal-add-qty", function(e) {
      e.preventDefault();
      curr_qty = $(".modal-qty-text").text();
      curr_qty++;
      $(".modal-qty-text").text(curr_qty);
    });
  
    $(document).on("click", ".add-cart-modal-close", function(e) {
      toastr.error("Sorry our restaurant is closed.");
    });
  

    $(document).on("click", ".add-cart-modal", function(e) {
      $(".panel-details-attributes").empty();
  
      var it_val = $(this).attr("value");
      var rest_id = $("#restid-" + it_val).val();
      $data = "item_id=" + it_val;
  
      $.ajax({
        url: base_url + "main/get_item_attributes",
        type: "POST",
        dataType: "json",
        data: $data,
        success: function(data) {
          if (data.item_options != null && data.group_attrib == "1" || data.menu_id === "2") {
            var name = 1;
            $(".modal-product-title").html(
              data.item_name +
                '<br><span class="text-md" >' +
                data.item_description +
                "</span>"
            );
            // $('.modal-product-description').text();
            $(".modal-product-price").text("KD " + data.item_price);
            $(".modal-dish-image").attr(
              "style",
              'background-image: url("' +
                base_url.replace("en/", "") +
                "admin/" +
                data.icon_url +
                '")'
            );
            $("#productModal").modal("show");
  
            var item_hidden_values =
              '<input name="item_id" id="attr_item_id" type="hidden" value="' +
              data.item_id +
              '" >' +
              '<input name="item_name" id="attr_item_name" type="hidden" value="' +
              data.item_name +
              '" >' +
              '<input name="item_price" id="attr_item_price" type="hidden" value="' +
              data.item_price +
              '" >' +
              '<input name="item_multi_select" id="attr_item_multi_select" type="hidden" value="' +
              data.item_multi_select +
              '" >' +
              '<input name="rest_id" id="attr_rest_id" type="hidden" value="' +
              rest_id +
              '" >';
            $(".panel-details-attributes").append(item_hidden_values);
  
            if (data.item_options != null) {
              $.each(data.item_options, function(k, item) {
                var item_attrib = "";
                var show = k == 0 ? "show" : "";
                var groupClass =
                  k == 0 ? "radio_title_size" : "radio_title_additions";
  
                if (item.attributes != null) {
                  $.each(item.attributes, function(key, it_attrbues) {
                    // var show = (key==0) ? 'checked' : '';
                    var show = "";
                    var type = "radio";
                    var selectorClass = "custom-control custom-radio";
  
                    if (it_attrbues.price === data.item_price) {
                      show = "checked";
                    }
  
                    if (item.multi_select == "1") {
                      type = "checkbox";
                      selectorClass = "custom-control custom-checkbox";
                    }
  
                    item_attrib +=
                      '<div class="col-md-6">' +
                      '<div class="form-group">' +
                      '<label class="' +
                      selectorClass +
                      '">' +
                      '<input data-item_group_id="' +
                      item.id +
                      '" data-attr_price="' +
                      it_attrbues.price +
                      '" data-override_option="' +
                      item.override_base_price +
                      '" id="' +
                      it_attrbues.name_ar +
                      '" name="radio_size" type="' +
                      type +
                      '" value="' +
                      it_attrbues.id +
                      '" name="attr' +
                      name +
                      '" class="custom-control-input options_ids" ' +
                      show +
                      ">" +
                      '<span class="custom-control-indicator"></span>' +
                      '<span class="custom-control-description">' +
                      it_attrbues.name +
                      " (KD " +
                      it_attrbues.price +
                      ")</span>" +
                      "</label>" +
                      "</div>" +
                      "</div>";
                  });
                }
  
                var item_attr_display =
                  '<div class="panel-details text-lg">' +
                  '<h5 class="panel-details-title">' +
                  '<label class="custom-control custom-radio">' +
                  '<input name="' +
                  groupClass +
                  '" type="radio" class="custom-control-input">' +
                  '<span class="custom-control-indicator"></span>' +
                  "</label>" +
                  '<a href="#panelDetails' +
                  k +
                  '" data-toggle="collapse">' +
                  item.group_name +
                  "</a>" +
                  "</h5>" +
                  '<div id="panelDetails' +
                  k +
                  '" class="collapse ' +
                  show +
                  '">' +
                  '<div class="panel-details-content">' +
                  '<div class="row">' +
                  item_attrib +
                  "</div>" +
                  "</div>" +
                  "</div>" +
                  "</div>";
  
                $(".panel-details-attributes").append(item_attr_display);
              });
            }
  
            $("#add-cart-button").attr("data-attr_item_id", data.item_id);
            $("#add-cart-button").attr("data-attr_item_name", data.item_name);
            $("#add-cart-button").attr("data-attr_item_price", data.item_price);
  
            var $icon = $(
              '<svg class="icon" x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>'
            );
            $(".custom-control-indicator").html($icon);
          } //there are no attributes
          else {
            var attribute_ids = "";
            var item_comment = "";
            post_array = {
              item_id: $("#id-" + it_val).val(),
              item_name: $("#name-" + it_val).val(),
              item_qty: $("#qty-" + it_val).val(),
              item_price: $("#price-" + it_val).val(),
              rest_id: $("#restid-" + it_val).val(),
              attribute_ids: attribute_ids,
              item_comment: item_comment
            };
  
            $.post(base_url + "main/add_item_to_cart", post_array, function(
              data
            ) {
              console.log(data);
              var res = jQuery.parseJSON(data);
              if (res.status != "AREA_NOT_FOUND") {
                update_cart_items(res.cart_view, res.total_cost, res.items_count);
                toastr.success("Item has been added to cart");
              } else {
                window.location.href = base_url + "main/index";
                toastr.error(
                  "please select delivery area before adding item into cart"
                );
                return false;
              }
            });
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus + ": " + errorThrown);
        },
        complete: function() {
          console.log("success");
        }
      });
    });

////////////////////////////////////////////////////////////////////////

    // $(document).on("click", ".add-attribute-to-cart", function(e) {
    //   e.preventDefault();
    //   $(this).prop("disabled", true);
    //   var attr_item_id = $(this).attr("data-attr_item_id");
    //   var item_qty = $(".modal-qty-text").text();
    //   var attr_item_name = $(this).attr("data-attr_item_name");
    //   var attr_item_price = $(this).attr("data-attr_item_price");
    //   var attr_rest_id = $("#attr_rest_id").attr("value");
    //   var item_comment = $("#modal-comment-textarea").val();
  
    //   var attribute_ids = $(".options_ids:checked")
    //     .map(function() {
    //       return this.value;
    //     })
    //     .get()
    //     .join(",");
  
    //   $url = base_url + "main/add_item_to_cart";
    //   $data =
    //     "attribute_ids=" +
    //     attribute_ids +
    //     "&item_id=" +
    //     attr_item_id +
    //     "&item_name=" +
    //     attr_item_name +
    //     "&item_price=" +
    //     attr_item_price +
    //     "&rest_id=" +
    //     attr_rest_id +
    //     "&item_comment=" +
    //     item_comment +
    //     "&item_qty=" +
    //     item_qty;
  
    //   $.ajax({
    //     url: $url,
    //     type: "POST",
    //     dataType: "json",
    //     data: $data,
    //     success: function(data) {
    //       $("#productModal").modal("hide");
    //       if (data.status != "AREA_NOT_FOUND") {
    //         update_cart_items(data.cart_view, data.total_cost, data.items_count);
    //         toastr.success("Item has been added to cart");
    //       } else {
    //         $("html, body").animate(
    //           { scrollTop: $("#area_select").offset().top - 240 },
    //           "slow"
    //         );
    //         toastr.error(
    //           "please select delivery area before adding item into cart"
    //         );
    //         return false;
    //       }
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
    //       toastr.error("error");
    //       console.log(textStatus + ": " + errorThrown + ":" + jqXHR);
    //     },
    //     complete: function() {
    //       $(".add-attribute-to-cart").prop("disabled", false);
    //     }
    //   });
    // });
  
    // $(document).on("click", ".add-qty", function() {
    //   var it_rid = $(this).attr("value");
    //   var it_qty = parseInt($("#" + it_rid).attr("value"), 10) + 1;
  
    //   post_array = {
    //     row_id: it_rid,
    //     qty: it_qty
    //   };
  
    //   $.post(base_url + "main/update_menu_cart", post_array, function(data) {
    //     var res = jQuery.parseJSON(data);
    //     if (res.status == "OK") {
    //       update_cart_items(res.cart_view, res.total_cost, res.items_count);
    //     } else if (res.status == "NO_ITEMS") {
    //       update_cart_items(res.cart_view, res.total_cost, res.items_count);
    //       toastr.error("No item in cart");
    //     } else if (res.status == "NOT_ALLOWED") {
    //       toastr.error("Not allowed");
    //     }
    //   });
    // });
  
    // $(document).on("click", ".sub-qty", function() {
    //   var it_rid = $(this).attr("value");
    //   var it_qty = parseInt($("#" + it_rid).attr("value"), 10) - 1;
  
    //   post_array = {
    //     row_id: it_rid,
    //     qty: it_qty
    //   };
  
    //   $.post(base_url + "main/update_menu_cart", post_array, function(data) {
    //     var res = jQuery.parseJSON(data);
    //     if (res.status == "OK") {
    //       update_cart_items(res.cart_view, res.total_cost, res.items_count);
    //     } else if (res.status == "NO_ITEMS") {
    //       update_cart_items(res.cart_view, res.total_cost, res.items_count);
    //       toastr.error("No item in cart");
    //     } else if (res.status == "NOT_ALLOWED") {
    //       toastr.error("Not allowed");
    //     }
    //   });
    // });
  
    // $(document).on("click", ".btn-remove", function() {
    //   var checkout = $(this).attr("data-checkout");
    //   post_array = {
    //     row_id: $(this).attr("value"),
    //     qty: "0",
    //     checkout: checkout
    //   };
    //   $.post(base_url + "main/update_menu_cart", post_array, function(data) {
    //     var res = jQuery.parseJSON(data);
    //     if (res.status == "OK") {
    //       update_cart_items(res.cart_view, res.total_cost, res.items_count);
    //     } else if (res.status == "NO_ITEMS") {
    //       update_cart_items(res.cart_view, res.total_cost, res.items_count);
    //       toastr.error("No item in cart");
    //     } else if (res.status == "NOT_ALLOWED") {
    //       toastr.error("Not allowed");
    //     }
    //   });
    // });
//----------------------------------------------------------------------------------------------------------------------------------------------//
    $(document).on("click", "#go-to-checkout", function() {
      $.ajax({
        type: "POST",
        dataType: "json",
        data: "cart_comment=" + $("#cart-comment-textarea").val(),
        url: base_url + "main/get_cart_status",
        success: function(data, textStatus, jqXHR) {
          if (data.content == 1) {
            window.location.href = base_url + "main/checkout";
          } else {
            toastr.error(data.msg);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus + ": " + jqXHR);
        },
        complete: function() {
          console.log("success");
        }
      });
    });
  
    $('input[name="order_time"]').on("change", function() {
      if ($(this).val() == "1") {
        $("#choose_time").show();
        setTimeout(function() {
          $("#choose_time").removeClass("hide");
        }, 300);
      } else {
        $("#choose_time").addClass("hide");
        setTimeout(function() {
          $("#choose_time").fadeOut(300);
        }, 300);
      }
    });
  
    $(".timepicker").timepicker({
      scrollDefault: "now",
      timeFormat: "g:i A",
      step: 15
    });
  
    $.datetimepicker.setLocale('en');
    $(".datetimepicker").datetimepicker({
      timepicker:true,
      minDate:'-1970/01/01',//yesterday is minimum date(for today use 0 or -1970/01/01)
    });
  
    $(".otpinput").keyup(function() {
      if ($(this).val().length >= 1) {
        var input_flds = $(this)
          .closest("form")
          .find(":input");
        input_flds.eq(input_flds.index(this) + 1).focus();
      }
    });
  
    $(document).on("change", "#city_id", function() {
      area_name = $(this)
        .find(":selected")
        .data("areaname");
      $("#city_name").val(area_name);
      update_cart_by_area($(this).val(), "yes");
    });
  
    // $(document).on("change", "#change_address_user", function() {
    //   $(".show_address_det").empty();
    //   var address_id = $(this).val();
    //   if (address_id != "") {
    //     $url = base_url + "main/get_address_detail";
    //     $data = "address_id=" + address_id;
    //     $.ajax({
    //       url: $url,
    //       type: "POST",
    //       dataType: "json",
    //       data: $data,
    //       success: function(data) {
    //         if (data !== null) {
    //           var address_detail_data =
    //             '<p id="address_div" data-area_id="' +
    //             data.area_id +
    //             '" >' +
    //             "" +
    //             data.address +
    //             "</p>";
    //           $(".show_address_det").append(address_detail_data);
    //           area_name = $("#city_id")
    //             .find(":selected")
    //             .data("areaname");
    //           $("#city_name").val(area_name);
    //         }
    //       },
    //       error: function(jqXHR, textStatus, errorThrown) {
    //         console.log(textStatus + ": " + errorThrown);
    //       },
    //       complete: function(data) {
    //         responseText = jQuery.parseJSON(data.responseText);
    //         area_id = responseText.area_id;
    //         if (area_id != null) {
    //           update_cart_by_area(area_id, "yes");
    //         }
    //       }
    //     });
    //   } else {
    //     $("html, body").animate(
    //       { scrollTop: $("#change_address_user").offset().top - 200 },
    //       "slow"
    //     );
    //     toastr.error("Address is required");
    //     return false;
    //   }
    // });
  
    $(document).on("click", ".get_order_details", function(e) {
      $("#order_details_view").empty();
      $(this)
        .siblings()
        .removeClass("text-primary");
      $(this).addClass("text-primary");
      var order_id = encodeURIComponent(
        $(this)
          .find("span")
          .data("order_id")
      );
      $url = base_url + "main/get_user_order_details";
      $data = "order_id=" + order_id;
      $.ajax({
        url: $url,
        type: "POST",
        data: $data,
        success: function(data) {
          if (data !== null) {
            $("#order_details_view").append(data);
          } else {
            toastr.error("No order Found");
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus + ": " + errorThrown);
        },
        complete: function() {
          console.log("success");
        }
      });
    });
  
    $(".modal").on("show.bs.modal", function(e) {
      window.location.hash = "modal";
    });
  
    $(window).on("hashchange", function(event) {
      if (window.location.hash != "#modal") {
        $(".modal").modal("hide");
      }
    });
    $("#c_submit").on("click", function(e) {
      e.preventDefault();
      var $contact_us = $("#contact_us");
      if ($contact_us.length > 0) {
        $form = $contact_us;
        if ($form.valid()) {
          $(this).prop("disabled", true);
          $data =
            "c_name=" +
            $("#c_name").val() +
            "&&c_email=" +
            $("#c_email").val() +
            "&&c_message=" +
            $("#c_message").val();
          $url = base_url + "main/send_contact_form";
          $.ajax({
            url: $url,
            type: "POST",
            dataType: "json",
            data: $data,
            success: function(data) {
              $("#msg_sent").empty();
              if (data.status == "sent") {
                $("#contact_button").hide();
                $("#msg_sent").append(
                  '<p class="text-primary">We have received your request, <br> a staff member will contact you shortly</p>'
                );
              } else {
                toastr.error("The requested information is not available");
              }
            }
          });
        }else {
          toastr.error("please fill appropriate details");
          return false;
        }
      }
    });
  
    $(document).on("click", ".voucher_btn", function(e) {
      var vou_code = $("#" + $(this).val()).val(); //get the voucher code entered by the user
      var restaurant_id = $(this).attr("data");
      if (vou_code != "" && vou_code.length == 6) {
        $url = base_url + "main/apply_voucher";
        $data = "voucher_code=" + restaurant_id + "|" + vou_code;
        $.ajax({
          url: $url,
          type: "POST",
          dataType: "json",
          data: $data,
          success: function(data) {
            if (data.status == "OK") {
              update_cart_items(
                data.cart_view,
                data.total_cost,
                data.items_count
              );
              toastr.success('Voucher Applied');
            } else if (data.status == "NO_VOUCHER") {
              toastr.error('Voucher code not found');
            } else if (data.status == "MIN_ORDER") {
              toastr.error('Order is less than the minimum amount for this Voucher');
            } else if (data.status == "NO_CAT") {
              toastr.error(data.status_msg);
            } else {
              toastr.error('Error while applying voucher');
            }
          }
        });
      } else {
        toastr.error('Please enter a valid Voucher Code');
      }
    });
  
    $(document).on("click", ".voucher-remove-icon", function(e) {
      var row_id = $(this).attr("value");
      $url = base_url + "main/remove_voucher";
      checkout = $(this).attr("data-checkout");
      $data = "row_id=" + row_id + "&checkout=" + checkout;
      $.ajax({
        url: $url,
        type: "POST",
        dataType: "json",
        data: $data,
        success: function(data) {
          if (data.status == "VOUCHER_REMOVED") {
            update_cart_items(data.cart_view, data.total_cost, data.items_count);
            toastr.success("Voucher Removed");
          } else {
            toastr.error("Error while removing voucher");
          }
        }
      });
    });
  
    $(document).ready(function() {
      name_area = $("#city_id option:selected").attr("data-areaname");
      $("#city_name").val(name_area);
    });
  
    $('input[name="delivery_pickup"]').on("change", function() {
      if ($(this).val() == "delivery") {
      } else {
      }
    });
  
    //track order
    $("#search_order").click(function() {
      order_id = $("#orderno").val();
      last_order_status = null;
      if (order_id == "") {
        $("#orderno").focus();
        toastr.error("Please enter your Order Id");
      } else {
        getguestOrderStatusAndUpdate(order_id);
      }
    });
  
    $('#orderDropdown').on('change', function(){
      order_id = $(this).val();
      last_order_status = null;
      if (order_id != "") {
        getguestOrderStatusAndUpdate(order_id); 
      }
    });
  
    function getguestOrderStatusAndUpdate(order_id = "") {
      if(order_id !== "") {
        $url = base_url + "main/get_order_detail";
        $data = "order_id=" + order_id;
        $.ajax({
          url: $url,
          type: "POST",
          dataType: "json",
          data: $data,
          success: function(data) {
            if(data){
              if(data.order_status != last_order_status){
                last_order_status = data.order_status;
                updateOrderTracking(data);
              }
              setTimeout(function() {
                getguestOrderStatusAndUpdate(data.order_id);
              }, 2000);
              
            }else{
              toastr.error("Incorrect Order id");
            }
          },
          error: function(jqxhr, textStatus, errorThrown) {
            toastr.error("Incorrect Order id");
          }
        });
      }
    }
  
    function updateOrderTracking(data) {
      initStatusBoxes();
  
      var orderStatus = data.order_status;
      lastStatus = orderStatus;
      date = data.order_date;
  
      $("#ordrid").text(data.order_id);
      $("#ordrdate").text(date.substring(0, 19));
      $("#ordrdel").html(data.order_address);
      $(".order-details").show();
  
      if (orderStatus === "pend" || orderStatus === "recv") {
        //pending
        $("#orderStatusText1").text("Order has been received.");
        //$('#orderStatusText1').css('color', '#d997f1');
        $("#StatusPendingBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--purple"
        );
      } else if (orderStatus === "ordy") {
        //accepted
        $("#orderStatusText1").text("Order has been received.");
        $("#orderStatusText2").text("Order has been accepted.");
        $("#StatusPendingBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--purple"
        );
        $("#StatusAcceptedBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--green"
        );
      } else if (orderStatus === "ofdv") {
        $("#orderStatusText1").text("Order has been received.");
        $("#orderStatusText2").text("Order has been accepted.");
        $("#orderStatusText3").text("Order is out for delivery.");
        $("#StatusPendingBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--purple"
        );
        $("#StatusAcceptedBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--green"
        );
        $("#StatusOutForDeliveryBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--blue"
        );
      } else if (orderStatus === "dilv") {
        $("#orderStatusText1").text("Order has been received.");
        $("#orderStatusText2").text("Order has been accepted.");
        $("#orderStatusText3").text("Order is out for delivery.");
        $("#orderStatusText4").text("Order has been delivered.");
        $("#StatusPendingBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--purple"
        );
        $("#StatusAcceptedBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--green"
        );
        $("#StatusOutForDeliveryBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--blue"
        );
        $("#StatusDeliveredBox").toggleClass(
          "timeline__step__marker--default timeline__step__marker--orange"
        );
      } else if (orderStatus === "rejc") {
        var rejectReason = data.RejectReason;
        if (rejectReason) {
          $("#StatusPendingBox").toggleClass(
            "timeline__step__marker--default timeline__step__marker--rej"
          );
          $("#orderStatusText1").text("Your Order has been Rejected.");
          $("#rejectedReasonText").text(rejectReason);
        }
      }
    }
  
    function initStatusBoxes() {
      $("#orderStatusText1").text("");
      $("#orderStatusText2").text("");
      $("#orderStatusText3").text("");
      $("#orderStatusText4").text("");
      $(".order-details").hide();
  
      $("#rejectedReasonText").text("");
      $("#StatusPendingBox").attr(
        "class",
        "timeline__step__marker timeline__step__marker--default"
      );
      $("#StatusAcceptedBox").attr(
        "class",
        "timeline__step__marker timeline__step__marker--default"
      );
      $("#StatusOutForDeliveryBox").attr(
        "class",
        "timeline__step__marker timeline__step__marker--default"
      );
      $("#StatusDeliveredBox").attr(
        "class",
        "timeline__step__marker timeline__step__marker--default"
      );
    }
  
    // function update_cart_items(cart, total, items_count) {
    //   $(".panel-cart-content").empty();
    //   $("#modal-comment-textarea").val("");
    //   $(".cartnum").empty();
    //   if (cart != null) {
    //     $(".panel-cart-content").append(cart);
    //     $(".cart-count").text(items_count);
    //     if (total > 0) {
    //       $(".cart-value").text("KD " + total.toFixed(3));
    //     } else {
    //       $(".cart-value").text("0");
    //     }
    //   }
    //   if (items_count == 0) {
    //     var checkoutUrl = base_url + "main/checkout";
    //     var currentUrl = $(location).attr("href");
    //     if (currentUrl == checkoutUrl) {
    //       window.location.href = base_url + "main/menu";
    //     }
    //   }
    // }
  
    // function update_cart_by_area(area_id, is_checkout = "no") {
    //   post_array = {
    //     area_id: area_id,
    //     checkout: is_checkout
    //   };
    //   $.post(base_url + "main/update_cart_by_area", post_array, function(data) {
    //     var res = jQuery.parseJSON(data);
    //     if (res.status == "OK") {
    //       update_cart_items(res.cart_view, res.total_cost, res.items_count);
    //     } else if (res.status == "NOT_ALLOWED") {
    //       toastr.error("Not allowed");
    //     }
    //   });
    // }
  
    // function update_menu_view(res_id) {
    //   $("#menu_items_view").empty();
    //   var url = base_url + "main/get_menu_by_rest/" + res_id;
    //   $.ajax({
    //     type: "POST",
    //     dataType: "json",
    //     url: url,
    //     success: function(data, textStatus, jqXHR) {
    //       if (data.menu_items_view) {
    //         $("#menu_items_view").append(data.menu_items_view);
    //       } else {
    //         $("#menu_items_view").append("<h4>No data found</h4>");
    //       }
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
    //       console.log(textStatus + ": " + errorThrown);
    //     },
    //     complete: function() {
    //       console.log("success");
    //     }
    //   });
    // }
  
    //proceed to checkout functions
  
    // $(document).on("click", "#order-now", function(e) {
    //   e.preventDefault();
    //   var $checkoutForm = $("#checkout-form");
    //   if ($checkoutForm.length > 0) {
    //     $form = $checkoutForm;
    //     if ($form.valid()) {
    //       if (is_some_time()) {
    //         if ($("#expected_order_time").val().length != 0) {
    //         //  validate_start_end_time();
    //         } else {
    //           $("#expected_order_time").focus();
    //           toastr.error("please enter your desired time");
    //           return false;
    //         }
    //       } else {
    //        // check_restauarant_open_status();
    //       }
    //     } else {
    //       $("html, body").animate(
    //         { scrollTop: $(".checkout-fields").offset().top - 80 },
    //         "slow"
    //       );
    //       toastr.error("please fill required fields");
    //       return false;
    //     }
    //   }
    // });
  
    function is_pickup() {
      var delivery_pickup = $("#delivery_pickup").val();
      return delivery_pickup == "pick_up" ? true : false;
    }
  
    function is_some_time() {
      var order_time = $("input:radio[name='order_time']:checked").val();
      return order_time == "1" ? true : false;
    }
  
    function check_restauarant_open_status() {
      $("#order-now").prop("disabled", true);
      $url = base_url + "main/check_working_time";
  
      $.ajax({
        url: $url,
        dataType: "json",
        success: function(response) {
          var res_status = response.open_close;
          if (res_status == 0) {
            toastr.error("Sorry our restaurant is closed.");
            $("#order-now").prop("disabled", false);
            return false;
          }
        },
        error: function(response) {
          $("#order-now").prop("disabled", false);
          toastr.error("Some error occured while processing your request");
        },
        complete: function(data) {
          var responseText = jQuery.parseJSON(data.responseText);
          status = responseText.open_close;
          if (status == 1) {
            check_branch_status();
          } else {
            $("#order-now").prop("disabled", false);
            return false;
          }
        }
      });
    }
  
    function check_branch_status() {
      $("#order-now").prop("disabled", true);
      $url = base_url + "main/check_branch_status";
  
      $.ajax({
        url: $url,
        dataType: "json",
        success: function(response) {
          var status = response.status;
          var msg = response.msg;
          if (status == 0) {
            toastr.error(msg);
            $("#order-now").prop("disabled", false);
            return false;
          }
        },
        error: function(response) {
          $("#order-now").prop("disabled", false);
          toastr.error("Some error occured while processing your request");
        },
        complete: function(data) {
          var responseText = jQuery.parseJSON(data.responseText);
          status = responseText.status;
          if (status == 1) {
            check_item_stock();
          } else {
            $("#order-now").prop("disabled", false);
            return false;
          }
        }
      });
    }
  
    // function validate_start_end_time() {
  
    //   selectedTime12 = $("#expected_order_time").val();
    //   deliveryMin = $("#delivery_time").val();
    //   url = base_url + "main/check_start_end_time_order_later";
  
    //   $.ajax({
    //     url: url,
    //     dataType: "json",
    //     type: "POST",
    //     data: 'order_later_time=' + selectedTime12 + '&delivery_min=' + deliveryMin,
    //     success: function(response) {
    //       var res_status = response.open_close;
    //       if (res_status == 0) {
    //         toastr.error(response.msg);
    //         $("#order-now").prop("disabled", false);
    //         return false;
    //       }
    //     },
    //     error: function(response) {
    //       $("#order-now").prop("disabled", false);
    //       toastr.error("Some error occured while processing your request");
    //     },
    //     complete: function(data) {
    //       var responseText = jQuery.parseJSON(data.responseText);
    //       status = responseText.open_close;
    //       if (status == 1) {
    //         check_branch_status();
    //       } else {
    //         $("#order-now").prop("disabled", false);
    //         return false;
    //       }
    //     }
    //   });
  
    // }
  
    function getTimeStamp(dateTime) {
      return dateTime.getTime();
    }
  
    function get24HrFormat(time) {
      var hours = parseInt(time.substr(0, 2));
      if (time.indexOf("am") != -1 && hours == 12) {
        time = time.replace("12", "0");
      }
      if (time.indexOf("pm") != -1 && hours < 12) {
        time = time.replace(hours, hours + 12);
      }
      return time.replace(/(am|pm)/, "");
    }
  
    function get12HrFormat(time) {
      var d = new Date();
      var strDate =
        d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate();
  
      var currentTime = new Date(strDate + " " + time);
      var hours = currentTime.getHours();
      var minutes = currentTime.getMinutes();
  
      if (minutes < 10) minutes = "0" + minutes;
  
      var suffix = "AM";
      if (hours >= 12) {
        suffix = "PM";
        hours = hours - 12;
      }
      if (hours == 0) {
        hours = 12;
      }
      var current_time = hours + ":" + minutes + " " + suffix;
  
      return current_time;
    }
  
    function check_item_stock() {
      $("#order-now").prop("disabled", true);
      $url = base_url + "main/check_item_stock";
  
      $.ajax({
        url: $url,
        type: "GET",
        success: function(response) {
          var jsonObject = jQuery.parseJSON(response);
          cartItems = jsonObject.items;
          if (cartItems != null) {
            $.each(cartItems, function(i, item) {
              if (item.is_stock == 0) {
                toastr.warning("sorry, " + item.name + " went out of stock.");
                $("html, body").animate(
                  { scrollTop: $("#checkout-form").offset().top - 40 },
                  "slow"
                );
                $("#order-now").prop("disabled", false);
                return false;
              }
            });
          } else {
            toastr.error("Some error occured while processing your request");
            $("#order-now").prop("disabled", false);
            return false;
          }
        },
        error: function(response) {
          toastr.error("Some error occured while processing your request");
          $("#order-now").prop("disabled", false);
          return false;
        },
        complete: function(data) {
          var responseText = jQuery.parseJSON(data.responseText);
          status = responseText.status;
          if (status == 1) {
            if (is_pickup()) {
              if (guest == "1") {
                // confirm_otp();
                process_order();
              } else {
                process_order();
              }
            } else {
              check_coverage();
            }
          } else {
            $("#order-now").prop("disabled", false);
            return false;
          }
        }
      });
    }
  
    function check_coverage() {
      $("#order-now").prop("disabled", true);
      $url = base_url + "main/check_delivery_coverage";
  
      $.ajax({
        url: $url,
        type: "GET",
        success: function(response) {
          var jsonObject = jQuery.parseJSON(response);
          if (jsonObject != null) {
            if (jsonObject.has_coverage != 1) {
              toastr.error("Sorry! We do not provide service in selected area");
              $("#order-now").prop("disabled", false);
              return false;
            }
          } else {
            toastr.error("Some error occured while processing your request");
            $("#order-now").prop("disabled", false);
            return false;
          }
        },
        error: function(response) {
          toastr.error("Some error occured while processing your request");
          $("#order-now").prop("disabled", false);
          return false;
        },
        complete: function(data) {
          var responseText = jQuery.parseJSON(data.responseText);
          if (responseText.has_coverage == 1) {
            check_min_order();
          } else {
            $("#order-now").prop("disabled", false);
            return false;
          }
        }
      });
    }
  
    function check_min_order() {
      $("#order-now").prop("disabled", true);
      $url = base_url + "main/check_minimum_order";
  
      $.ajax({
        url: $url,
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response != null) {
            if (response.proceed_result != "yes") {
              toastr.error(
                "Please place an order of min. " +
                  response.proceed_result +
                  "KD to proceed."
              );
              $("#order-now").prop("disabled", false);
              return false;
            }
          } else {
            toastr.error("Some error occured while processing your request");
            $("#order-now").prop("disabled", false);
            return false;
          }
        },
        error: function(response) {
          toastr.error("Some error occured while processing your request");
          $("#order-now").prop("disabled", false);
          return false;
        },
        complete: function(response) {
          var json = jQuery.parseJSON(response.responseText);
          if (json.proceed_result == "yes") {
            if (guest == "1") {
              // confirm_otp();
              process_order();
            } else {
              process_order();
            }
          } else {
            $("#order-now").prop("disabled", false);
            return false;
          }
        }
      });
    }
  
    $('input[name="payment_method_id"]').on("change", function() {
      payment_method = $(this).val();
    });
  
    payment_method = $('input[name="payment_method_id"]').val();
    guest = $('input[name="is_guest_checkout"]').val();
  
    function process_order() {
      checkOutAction = payment_method == 2 ? "cod_checkout" : "payment_checkout";
      document.checkoutdata.action = base_url + "main/" + checkOutAction;
      document.checkoutdata.submit();
    }
  
    function confirm_otp() {
      var payment_method = $("input[name=payment_method_id]:checked").val();
      if (payment_method == 2) {
        $url = base_url + "main/create_guest_user_otp";
        $data = { contact_no: $("#guest_contact").val() };
  
        $.ajax({
          url: $url,
          type: "POST",
          data: $data,
          success: function(response) {
            var jsonObject = jQuery.parseJSON(response);
            if (jsonObject.status == "ok") {
              $("#otpModal").modal("show");
              otp = jsonObject.otp;
            } else {
              toastr.error("Unable to send OTP, please try again later");
            }
          },
          error: function(response) {
            toastr.error("Some error occured while processing your request");
          }
        });
      } else {
        process_order();
      }
    }
  
    $("#otp_verify").on("click", function() {
      if (otp != null) {
        var user_otp = $("input[name=otp1]").val();
        user_otp += $("input[name=otp2]").val();
        user_otp += $("input[name=otp3]").val();
        user_otp += $("input[name=otp4]").val();
        user_otp += $("input[name=otp5]").val();
        user_otp += $("input[name=otp6]").val();
        if (user_otp == otp) {
          process_order();
        } else {
          toastr.error("invalid otp entered");
        }
      }
    });
  });