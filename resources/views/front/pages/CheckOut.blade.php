@extends('front.layout.master')
<?php
use App\Models\products;
use App\Models\areas;
$contPro = 1;
$total = 0;
?>


@section('CatProducts')

    <div class="page-title header-mt-10 rest-cover"
        style="background-image: url(http://alkadisweets.com/admin/uploads/restaurantimages/ckcl6.jpg)">
        <div class="container">
            <div class="row rest-status">
                <div class="col-lg-12 text-left text-lg mb-3">


                    @if (date('H:i') <= date('H:i', strtotime(session()->get('CloseTo'))))
                        <b class="badge badge-success">
                            {{ trans('frontHeader.StateOpenTime') }}
                        </b>
                    @else
                        <b class="badge badge-danger">
                            {{ trans('frontHeader.StateCloseTime') }}
                        </b>
                    @endif
                </div>
                <div class="col-lg-12 text-left text-lg text-white">
                    <h4 class="mb-0 txt-color">
                        <span class="">{{ trans('frontHeader.DeliverTime') }} &colon;</span> <span class="">
                            @if (date('A', strtotime(session()->get('OpenFrom'))) == 'AM')
                                {{ date('h:i', strtotime(session()->get('OpenFrom'))) }}{{ trans('frontHeader.Morning') }}
                            @endif
                        </span> &ndash; <span class="">
                            @if (date('A', strtotime(session()->get('CloseTo'))) == 'PM')
                                {{ date('h:i', strtotime(session()->get('CloseTo'))) }}{{ trans('frontHeader.evening') }}
                            @endif
                        </span>
                        <br>
                        {{ trans('frontHeader.MinPriceOrder') }} &colon; {{ session()->get('MinOrderPrice') }}
                        {{ trans('frontHeader.KD') }}
                    </h4>
                </div>
            </div>
        </div>
    </div>


    <section class="container">
        <div class="row ">
            <div class="col-xl-6 col-md-6 col-sm-12 table-responsive-sm  rounded">
                <div class="bg-dark dark p-4">
                    <h5 class="mb-0">Your order</h5>
                </div>
                <table class="w-100 table-striped">


                    <tbody>
                        <tr>
                            @if (session()->get('cart') !== null)
                                @foreach (session()->get('cart') as $cartProduct)
                                    <?php
                                    $product = products::where(['ProductID' => $cartProduct['ProductId']])->first();
                                    
                                    ?>
                                    {{-- {{ $product}} --}}
                                    {{-- @foreach ($product as $Details) --}}
                                    <td>{{ $contPro }}</td>
                                    <td><img width="100" height="auto"
                                            src="{{ asset($product->ProductImagePath) }}" /></td>
                                    <td>{{ $product->ProductArName }}</td>
                                    <td>
                                        <span>{{ $cartProduct['Qty'] }}</span>
                                    </td>
                                    <td><span
                                            id="Price_{{ $cartProduct['ProductId'] }}">{{ number_format($cartProduct['Price'], 3) }}</span>
                                    </td>
                                    <td><span
                                            id="TotalPrice_{{ $cartProduct['ProductId'] }}">{{ number_format($cartProduct['TotalPrice'], 3) }}</span>
                                    </td>
                                    <td></td>

                                    {{-- <td><button onclick="DeletePro{{$cartProduct['ProductId']}}(this)" Productid="{{$cartProduct['ProductId']}}" class="btn text-center text-danger"><i class="fa fa-remove"></i></button></td>  --}}
                        </tr>
                        {{-- @endforeach --}}
                        <?php
                        $contPro++;
                        $total += floatval($cartProduct['TotalPrice']);
                        ?>
                        {{-- <script>
                         function DeletePro{{$cartProduct['ProductId']}}(val) {

                            let proid = $(val).attr('Productid');
                            let qty= parseInt($("#Qty_{{$cartProduct['ProductId']}}").val());
                            let price = parseFloat($("#Price_{{$cartProduct['ProductId']}}").html());
                            let total = parseFloat($("#TotalPrice_{{$cartProduct['ProductId']}}").html());
                            let amount = parseFloat($("#Amount").html());
                            let totalamount = parseFloat($("#TotalAmount").html());


                            $.ajax({
                                method:'',
                                url:'cart/delete/'+$(val).attr('Productid'),
                                success:function(reponse){
                                    if(reponse  !=='')
                                    {
                                        $(val).parents("tr").remove();
                                        $("#Amount").html( parseFloat(reponse).toPrecision(2) );
                                        $("#TotalAmount").html( parseFloat(parseFloat(reponse)+1).toPrecision(2));
                                    }
                                    console.log(reponse);
                                },
                                error:function(err){
                                    console.log(reponse);
                                }
                            })
                        }
                        function getAtt{{$cartProduct['ProductId']}}(val) {
                            let proid = $(val).attr('Productid');
                            let qty= parseInt($("#Qty_{{$cartProduct['ProductId']}}").val());
                            let price = parseFloat($("#Price_{{$cartProduct['ProductId']}}").html());
                            let total = parseFloat($("#TotalPrice_{{$cartProduct['ProductId']}}").html());
                           
                            let amount = parseFloat($("#Amount").html());
                            let totalamount = parseFloat($("#TotalAmount").html());
                            $("#TotalPrice_{{$cartProduct['ProductId']}}").html(parseFloat(qty*price).toPrecision(2));
                            $("#Amount").html( parseFloat(amount + total).toPrecision(3) );

                            
                            $("#TotalAmount").html(  parseFloat().toPrecision(2)); 

                            $.ajax({
                                method:'',
                                url:'cart/'+$(val).attr('Productid'),
                                data:{Qty:qty,Price:price,Total:total},
                                success:function(reponse){

                                    console.log(reponse);
                                  
                                },
                                error:function(err){
                                    console.log(err);
                                }
                            })

                            
                                    
                                    
                            //alert(qty);
                        } 
                    </script> --}}
                        @endforeach
                        @endif
                        <tr>
                            <td colspan="7">
                                <br>
                                <hr>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3">المبلغ</td>
                            <td colspan="4"><b>KWD</b> <span id="Amount"
                                    class="text-success">{{ number_format($total, 3) }}</span></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3">التوصيل</td>
                            <td colspan="4"><b>KWD</b> <span id="Amount"
                                    class="text-success">{{ number_format(1, 3) }}</span></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3">الاجمالى</td>
                            <td colspan="4"><b>KWD</b> <span id="Amount"
                                    class="text-success">{{ number_format($total, 3) + 1 }}</span> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12  rounded ">
                <form action="https://api.myfatoorah.com/v2/SendPayment" method="POST" enctype="application/json">
                    @csrf
                    <div class="box">

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">الاسم</label>
                                <input type="text" name="CustName" required class="form-control" id=""
                                    aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-danger">
                                    @if (session('Cust') !== '')
                                        {{ session('Cust') }}
                                    @endif
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="">رقم التليفون</label>
                                <input type="number" required name="MobNo" min="0" maxlength="8"
                                    class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="">المنطقة</label>
                                {{-- <label for="inputState">State</label> --}}
                                <select name="AreaID" id="inputState" class="form-control">
                                    @foreach (areas::all() as $area)
                                        @if (session()->get('lang') === 'en')
                                            <option value="{{ $area->AreaID }}">{{ $area->AreaEnName }}</option>
                                        @else
                                            <option value="{{ $area->AreaID }}">{{ $area->AreaArName }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">قطعة</label>
                                <input type="number" required name="Block" min="1" maxlength="4"
                                    class="form-control" id="" style="width: 40%" aria-describedby="emailHelp"
                                    placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group ">
                                <label for="">شارع</label>
                                <input type="text" name="Street" required class="form-control" id=""
                                    aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">جادة</label>
                            <input type="number" name="Jadda" min="1" maxlength="4"
                                class="form-control mb-2" id="" style="width: 40%" aria-describedby="emailHelp"
                                placeholder="">

                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">منزل</label>
                            <input type="number" name="HouseNo" min="1" required maxlength="4"
                                class="form-control" id="" style="width: 40%" aria-describedby="emailHelp"
                                placeholder="">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">تليفون المنزل </label>
                            <input type="number" name="HomeTel" min="1" maxlength="4" class="form-control"
                                id="" style="width: 40%" aria-describedby="emailHelp" placeholder="">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Payment" id="exampleRadios1"
                                value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                كى نت
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Payment" id="exampleRadios2"
                                value="2">
                            <label class="form-check-label" for="exampleRadios2">
                                الدفع عند التوصيل
                            </label>
                        </div>

                    </div>
                    <div class="box-footer">
                        <div>
                            <br>
                            <input class="btn btn-success  text-light btn-block mw-50" type="submit" value="تأكيد الدفع"
                                style="background-color: rgb(1, 100, 9) " />
                        </div>
                    </div>
            </div>
            <div class="box-footer">

            </div>
        </div>
        </form>
        </div>
        </div>
        <div class="row "></div>
    </section>
    {{-- <script >

function DeletePro{{$cartProduct['ProductId']}}(val) {

let proid = $(val).attr('Productid');
let qty= parseInt($("#Qty_{{$cartProduct['ProductId']}}").val());
let price = parseFloat($("#Price_{{$cartProduct['ProductId']}}").html());
let total = parseFloat($("#TotalPrice_{{$cartProduct['ProductId']}}").html());
let amount = parseFloat($("#Amount").html());
let totalamount = parseFloat($("#TotalAmount").html());


$.ajax({
    method:'',
    url:'cart/delete/'+$(val).attr('Productid'),
    success:function(reponse){
        if(reponse  !=='')
        {
            $(val).parents("tr").remove();
            $("#Amount").html( parseFloat(reponse).toPrecision(2) );
            $("#TotalAmount").html( parseFloat(parseFloat(reponse)+1).toPrecision(2));
        }
        console.log(reponse);
    },
    error:function(err){
        console.log(reponse);
    }
});
}
    </script> --}}

@endsection
