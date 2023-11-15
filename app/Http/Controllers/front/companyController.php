<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\company;
use App\Models\customer;
use App\Models\govern;
use App\Models\governArea;
use App\Models\order;
use App\Models\orderdetail;
// use GuzzleHttp\Client;
use App\Models\service;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class companyController extends Controller
{
    //

    public function home() //:View
    {
        $subtotalAmount = 0.0;
        // $totalCartAmount = 0.0;

        $cart = cart::where("token", "=", session()->get("tokenCart"))->get();
        foreach ($cart  as $key => $value) {
            $subtotalAmount += round($value->totalprice, 3);
        }
        return view('front.pages.index', compact("cart", "subtotalAmount"));
    }

    public function viewList() //:View
    {
        $companiesWithServices = company::with("services")->with("companyservicetype")->get();
        // return $companiesWithServices;
        $cart = cart::where("token", "=", session()->get("tokenCart"))->get();
        $subtotalAmount = 0.0;

        foreach ($cart  as $key => $value) {
            $subtotalAmount += round($value->totalprice, 3);
        }

        // return   $companiesWithServices ;
        return view('front.pages.Menu', compact("companiesWithServices", "cart", "subtotalAmount")); //->with(["subtotalAmount"=>$subtotalAmount]);
    }

    public function showdetails($id) //: View 
    {
        $service = service::with("terms")->with("company")->find($id);
        if ($service == null)
            return redirect()->back();


        $cart = cart::where("token", "=", session()->get("tokenCart"))->get();
        $subtotalAmount = 0.0;

        foreach ($cart  as $key => $value) {
            $subtotalAmount += round($value->totalprice, 3);
        }

        return view("front.pages.servicedetails", compact("service", "cart", "subtotalAmount"));
    }

    public function getCustomerDetails() //:View
    {
        $governs = govern::all();
        $cart = cart::with("services")->where("token", "=", session()->get("tokenCart"))->get();
        $subtotalAmount = 0.0;
        if ($cart->count() == 0)
            return Redirect()->route("addtocart");

        foreach ($cart  as $key => $value) {
            # code...
            $subtotalAmount += $value->totalprice;
        }
        // return $cart; 
        return view("front.pages.cartOrders", compact("cart", "governs", "subtotalAmount"));
    }
    public function fillCart(Request $request) //:View
    {
        // return $request;
        if (!session()->has("tokenCart"))
            session()->put("tokenCart", $request->_token);

        $Existcart = cart::where(["token" => $request->_token])->with("services")->get();

        if ($Existcart->count() == 0) {

            $cart = cart::create([
                "token" => $request->_token,
                "service_id" => $request->ServiceID,
                "qty" => $request->ServiceQty,
                "TotalPrice" => $request->ServiceQty * $request->price,

            ]);
            $cart->save();

            $cartTable = array(array());
            array_push($cartTable[0], $cart);
            return   response()->json($cartTable);

            // return response()->json([
            //     "CartorTable" => [
            //         [
            //             "Price" => $request->ServiceQty * $request->price,
            //             "Qty" => $request->ServiceQty,
            //             "uuid" => $request->ServiceID,
            //             "TotalPrice" => round($request->ServiceQty * $request->price, 3,),
            //             "ProductName" =>  $cart->services->first()->name,
            //         ],

            //     ],
            //     "CartLenth" => 1,
            //     "CartTotalPrice"=>round($request->ServiceQty * $request->price, 3),

            // ]);
        } else {
            $Existcart = cart::where(["token" => $request->_token, "service_id" => $request->ServiceID])->with("services")->get();


            foreach ($Existcart as $key => $item) {
                # code...
                $item->token = $request->_token;
                $item->service_id = $request->ServiceID;
                $item->qty = $request->ServiceQty;
                $item->totalprice = $request->ServiceQty * $request->price;
                $item->save();
            }

            $cartTable = array(array());
            array_push($cartTable[0], $Existcart);
            // array_push($cartArrayBack["CartorTable"], $Existcart);

            return   response()->json($Existcart);
            // return response()->json([
            //     "CartorTable" => [
            //         [
            //             "Price" => $request->price,
            //             "Qty" => $request->ServiceQty,
            //             "uuid" => $request->ServiceID,
            //             "totalprice" => round($request->ServiceQty * $request->price, 3),
            //             "ProductName" =>$Existcart->first()->services->first()->name,
            //             "CartLenth" => $Existcart->count()
            //         ],
            //     ],
            //     "CartLenth" => 1,
            //     "CartTotalPrice"=>round($request->ServiceQty * $request->price, 3),
            // ]);
        }
    }

    public function decreaseCartQty(Request $request) //:View
    {
        // return $request ;
        $cart = cart::where(["service_id" => $request->proid, "token" => session()->get('tokenCart')])->with("services")->get();
        //return $cart ->first()->services->first()->price;
        // return $request;
        foreach ($cart as $key => $item) {
            # code...
            $item->qty  = $item->qty  - 1;
            $item->totalprice = $item->services->first()->price * $item->qty;

            $item->save();
        }
        // $cart = cart::where(["service_id"=>$id])->with("services")->get();

        return $cart;
    }

    public function increaseCartQty(Request $request) //:View
    {
        // return $request;
        $cart = cart::where(["service_id" => $request->proid, "token" => session()->get('tokenCart')])->with("services")->get();
        //return $cart ->first()->services->first()->price;
        // return $request;
        foreach ($cart as $key => $item) {
            # code...
            $item->qty  = $item->qty  + 1;
            $item->totalprice = $item->services->first()->price * $item->qty;

            $item->save();
        }
        // $cart = cart::where(["service_id"=>$id])->with("services")->get();

        return $cart;
    }

    public function destroy(Request $request, $id) //:View
    {

        $cart = cart::where(["service_id" => $request->proid, "token" => session()->get('tokenCart')])->with("services")->get();
        // return $request;
        foreach ($cart as $key => $item) {
            # code...
            $item->delete();
        }
        // $cart = cart::where(["service_id"=>$id])->with("services")->get();

        if ($cart->count() == 0)
            return response()->json(["0"]);

        return $cart;
    }


    public function PayMent(Request $request)
    {

        // return $request;


        $validate = $request->validate([
            "firstname" => 'required',
            "lastname" => "required",
            // " tel" => ["required", "unique:customers"],
            // "govern_id" => "required",
        ]);



        $newOrderNo = "";

        $getLastOrderNo = order::orderByDesc("id")->first()->id;
        // return $getLastOrderNo;
        if ($getLastOrderNo == null) {
            $newOrderNo = "Order_" . rand(100, 200);
        } else {
            $ArrayKey = explode("_", $getLastOrderNo);
            $num = intval($ArrayKey[1]) + 1;
            $newOrderNo = "Order_" . $num;
        }

        $cart = cart::with("services")->where("token", "=", session()->get("tokenCart"))->get();
        $subtotalAmount = 0.0;
        if ($cart->count() > 0)
            foreach ($cart as $item) {
                $subtotalAmount += $item->totalprice;
            }

        // ---------------------------save customer -------------

        $customer = customer::where("tel", "=", $request->tel)->first();
        if ($customer == null) {
            $customer = customer::updateOrCreate([
                "id" => Str::uuid(),
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "tel" => $request->tel,
                "govern_id" => $request->govern_id,
                "address" => $request->address,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $customer ->save();
        }

        $order  = order::updateOrCreate([
            //id	customer_id	paied	totalprice	reference_number	finished	created_at	updated_at	
            "id"=>$newOrderNo,
            "customer_id"=>$customer->id,
            // "paied",
            "totalprice"=>$subtotalAmount,
            // "reference_number",
            // "finished",
            "created_at" =>now(),
            "updated_at"=>now(),
        ]);

        $order ->save();

        if($cart->count()>0){
            foreach ($cart as $item) {
                $orderDetails = orderdetail::updateOrCreate([
                    // "id"=>Str::uuid(),
                    "service_id"=>$item->service_id,
                    "order_id"=>$newOrderNo,
                    "created_at" =>now(),
                    "updated_at"=>now(),
                ]);
                $orderDetails->save();
            }
        }
    




        $successResponse = url("/Success");
        $errorResponse = url("/faild");

        $auth = "Authorization:Api-Key SssrRTEe.vst5nD2bYduAKgAhv9SyIfoycfkpmNIB ";
        $url_api_send_request = curl_init();
        $ApiArrayFields = array(
            "type" => "e_commerce",
            "amount" => $subtotalAmount,
            "pg_codes" => ["knet",],
            "currency_code" => "KWD",
            "order_no"=>$newOrderNo,
            "customer_first_name " => $customer->firstname,
            "customer_last_name" => $customer->lastname,
            "customer_phone" => $customer->tel,
            "redirect_url" => $errorResponse,
            // "notify_webhook_url" => false,
            "webhook_url" => $successResponse,

        );
        $cur_Op =   array(
            CURLOPT_URL => "https://pay.amenha-kw.com/b/checkout/v1/pymt-txn", ////https://api.myfatoorah.com/v2/SendPayment///////////////https://apitest.myfatoorah.com/v2/ExecutePayment
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $ApiArrayFields,
            CURLOPT_HTTPHEADER => [$auth],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC
        );
        $htr =  curl_setopt_array($url_api_send_request, $cur_Op);
        $response = curl_exec($url_api_send_request);
        $errorresp = curl_error($url_api_send_request);
        curl_close($url_api_send_request);

        if ($errorresp) {
            return  $errorresp;
        }

        $collectresponse = json_decode($response, false);
        $url = $collectresponse->payment_methods[0]->redirect_url;

  
       
        return  ;
        // return  redirect($url);
    }



    public function PaymentSuccess($request)
    {
        return $request;
    }
}
