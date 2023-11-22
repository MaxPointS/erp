<?php

use App\Events\paymentEvent;
use App\Http\Controllers\ChangeLangController;
use App\Http\Controllers\cpanel\areasController;
use App\Http\Controllers\cpanel\com_serviceController;
use App\Http\Controllers\cpanel\insurance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\companyController;
use App\Http\Controllers\cpanel\companyController  as CpanelCompanyController;
use App\Http\Controllers\cpanel\governController;
use App\Http\Controllers\cpanel\RolesController;
use App\Http\Controllers\cpanel\servicesController;
use App\Http\Controllers\cpanel\servicetypeController;
use App\Http\Controllers\cpanel\usersController;
use App\Http\Controllers\cpanel\settings;
use App\Http\Controllers\cpanel\thirdpartyinsurance;
use App\Models\cart;
use App\Notifications\peaymentnotification;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use  Illuminate\Support\Facades\Storage;



Route::get('/', [companyController::class, "home"])->name("home");

Route::get('/com-services', [companyController::class, "viewList"])->name("companyServices");
Route::post('/com-services', [companyController::class, "fillCart"])->name("addtocart");
Route::get('/com-services/{id?}', [companyController::class, "showdetails"])->name("showservicedetails");

Route::delete('/CartRemoveQty/{id}', [companyController::class, "decreaseCartQty"])->name("RemoveQtyFromCart");
Route::put('/CartAddQty/{id}', [companyController::class, "increaseCartQty"])->name("AddQtyToCart");
Route::delete('/delete/{id}', [companyController::class, "destroy"])->name("removeCartItem");
Route::get('/checkout', [companyController::class, "getCustomerDetails"])->name("customerCart");
Route::post('/checkout', [companyController::class, "PayMent"])->name("CheckOut");

Route::get('/about', function () {
    return view('front.pages.about')->with(["cart" => cart::all()]);
});
Route::post("/lang", [ChangeLangController::class, 'ChangeLangauge'])->name("ChangeLangauge");

Route::get("/test", function () {
    return hash_hmac("sha256","","amenha");
    // return view("testLogin");
});
Route::get("/faild", function (Request $re) {
    return response()->json($re);
    // return $re->header();
});

// Route::json("/Success",function(Request $r){
//     return response()->json($r,200);
// });
Route::get("/Success", function () {return redirect()->route("home");});

Route::post("/Success", function (Request $r) {

    $url = 'https://demo.knpay.net/pos/crt/';
            $data = array(
                "amount" => 100,
                "currency_code" => "KWD",
                "gateway_code" => ["knet"],
                "order_no" => "hghb215",
                // "customer_email" => $email,
                "disclosure_url" => "https://demo.knpay.net/pay_test/knpay_response.php",
                "redirect_url" => "https://demo.knpay.net/payment-response/",
            );                                                                    
            $data_json = json_encode($data);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec ($ch);

            return  $output;
            $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($info == '200'){
                $result = json_decode($output);
            }
            else {
                $result = 'error';
            }


// $response = file_get_contents('php://input');
// $decoded_response = json_decode($response);
// $pre_order_id = $decoded_response->order_no;
// $amount = $decoded_response->amount;
// $result = $decoded_response->result;

            // return response()->noContent(200);
//     $successResponse = url("/Success");
//     $errorResponse = url("/faild");

//     $auth = "Authorization:Api-Key SssrRTEe.vst5nD2bYduAKgAhv9SyIfoycfkpmNIB ";
//     $url_api_send_request = curl_init();
//     $ApiArrayFields = array(
//         "type" => "e_commerce",
//         "amount" => 12,
//         "pg_codes" => ["knet",],
//         "currency_code" => "KWD",
//         // "order_no"=>"assas1515",
//         "customer_first_name " => "asffgsdg",
//         "customer_last_name" => "sdgsdgsd",
//         "customer_phone" => "dsgsdg",
//         "redirect_url" => $errorResponse,
//         // "notify_webhook_url" => false,
//         "webhook_url" => $errorResponse,

//     );
//     $cur_Op =   array(
//         CURLOPT_URL => "https://pay.amenha-kw.com/b/checkout/v1/pymt-txn", ////https://api.myfatoorah.com/v2/SendPayment///////////////https://apitest.myfatoorah.com/v2/ExecutePayment
//         CURLOPT_POST => 1,
//         CURLOPT_POSTFIELDS => $ApiArrayFields,
//         CURLOPT_HTTPHEADER => [$auth],
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_HTTPAUTH => CURLAUTH_BASIC
//     );
//     $htr =  curl_setopt_array($url_api_send_request, $cur_Op);
//     $response = curl_exec($url_api_send_request);
//     $errorresp = curl_error($url_api_send_request);
//     curl_close($url_api_send_request);

//     if ($errorresp!=null) {
//         return  $errorresp;
//     }

//     $collectresponse = json_decode($response, false);
//     $url = $collectresponse->payment_methods[0]->redirect_url;
//     $res = response()->json("https://pay.amenha-kw.com/checkout/11f11c95958318582507d8783100ec5b24e9a37b", 200);
//    // $esp =  Redirect::away($url);

//     return  $collectresponse ;

//     $gr = file_get_contents("https://webhook.site/#!/47489194-fec3-4bb5-8da4-67af36cc2cf8");//req-content
//    $t =  paymentEvent::dispatch($r);
  

});

//-------------------------------------------------------cpanel--------------------------------


Route::prefix('siteCpanel')->group(function () {

    Route::get('/', function () {return view('dashboard'); })->name('dashboard');
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/insurance', [insurance::class, "index"])->name('showInsurance');

    //-----------------------------------------companies--------------------------------------------------
    // Route::prefix("companies")->group(function () {

        Route::resources([
            'companies'=>CpanelCompanyController::class,
             'service'=>servicesController::class,
             'thirdparty'=>thirdpartyinsurance::class,

        ]);
        // Route::get('/create', [CpanelCompanyController::class, "create"])->name('CreateCompany');
        // Route::post('/store', [CpanelCompanyController::class, "store"])->name('storeCompany');
        // Route::get('/edit/{id}', [CpanelCompanyController::class, "edit"])->name('Companyedit');
        // Route::put('/update/{id}', [CpanelCompanyController::class, "update"])->name('Companyupdate');

        //-----------------------------------------services--------------------------------------------------

        Route::prefix("service")->group(function () {

            Route::get('/', [CpanelCompanyController::class, "AddService"])->name('AddService');
            Route::get('/{id}', [CpanelCompanyController::class, "EditService"])->name('EditService');
            Route::post('/edit', [CpanelCompanyController::class, "updateService"])->name('updateService');
            Route::get('/addconditions/condition', [CpanelCompanyController::class, "addcondition"])->name('addconditions');
            Route::post('/createcondition', [CpanelCompanyController::class, "createcondition"])->name('createcondition');
            Route::post('/store', [CpanelCompanyController::class, "storeService"])->name('storeService');

        });

        //-----------------------------------------endservices--------------------------------------------------

    // });
    //-----------------------------------------endcompanies--------------------------------------------------

    Route::prefix('settings')->group(function () {

        Route::get("/areas", [areasController::class, "showList"])->name("areas");
        Route::get("/governs", [governController::class, "ViewList"])->name("governs");
        Route::get("/servicetype", [servicetypeController::class, "viewServicesTypeList"])->name("serviceType");
        Route::get("/roles", [RolesController::class, "viewRolesList"])->name("RoleList");
        Route::get("/users", [usersController::class, "viewUsersList"])->name("UsersList");
        Route::get("/users", [usersController::class, "viewUsersList"])->name("UsersList");

        Route::get("/carlicensetype", [settings::class, "viewCarLicenseTypePage"])->name("carlicensetype");
        Route::get("/carfactory", [settings::class, "viewCarFactory"])->name("carfactory");
        Route::get("/carfactoryclasses", [settings::class, "viewCarFactoryClass"])->name("carfactoryclasses");
        Route::get("/carshapes", [settings::class, "viewCarShape"])->name("carshapes");
        Route::get("/carcolors", [settings::class, "viewCarColor"])->name("carcolors");
        Route::get("/carfuel", [settings::class, "viewCarFuel"])->name("carfuel");
        Route::get("/carconditions", [settings::class, "viewCarCondition"])->name("carconditions");

         
    });

    Route::get('/com-service', [com_serviceController::class, "view"])->name("com-service-view"); //->middleware('can:view');

})->middleware(["auth", "verified"]);

//-------------------------------------------------------endcpanel--------------------------------







// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
require __DIR__ . '/auth.php';
