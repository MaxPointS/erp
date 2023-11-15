<!DOCTYPE html>
<html lang="en" style="display: block">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}


    <script>
        $(document).ready(function() {
            let sound = new Audio("{{asset('sound/oh.mp3')}}");
            // $(".lable").css("background", "#000");
            let printbutton = $("#printPageButton");
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                // didOpen: (toast) => {
                //     toast.addEventListener('mouseenter', Swal.stopTimer)
                //     toast.addEventListener('mouseleave', Swal.resumeTimer)
                // }
            });
            $(printbutton).on("click", function(event) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('getString') }}",
                    //  data: "data",
                    dataType: "json",
                    success: function(response) {
                        $.each(response, (indexInArray, valueOfElement) => {
                            Toast.fire(indexInArray.toString(), valueOfElement
                            .toString(), "info");
                        });
                        sound.play();
                    },
                    error: function(err) {
                        console.log(err);
                    },
                })
            });
        });
    </script>
    <style>
        @media print {
            #printPageButton {
                display: none;
            }

            .page {
                page-break-after: always;
            }
        }

        table {
            font-family: Arial, Helvetica, sans-serif !important;
            width: 100%;
            
            overflow: auto;
        }

        table,
        td {
            /* border: 1px solid black; */
            width: 100%;
        }
        tr{
            height: 25px !important;
          
        }
        td {
            /* width: 80px; */
            width: 16%;
            height: 25px !important;
            padding: 0;
        }

        td.data {
            /* width: 80px; */
            text-align: center;
            /* width: 16%; */

        }

        td.lable {
            /* width: 16%; */
            text-align: right;
        }
    </style>

</head>

<body>
    <div>
        <img src="{{ url('imgs/logo.png') }}" alt="">
    </div>

    <div class="page">
        <div>
            <img src="{{ url('imgs/logo.png') }}" alt="">
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="col data">wewe</td>
                    <td class="fs-6 lable">سنة الصنع</td>
                    <td class="col data"></td>
                    <td style="text-align: right">الترخيص</td>
                    <td class="col data"></td>
                    <td style="text-align: right">رقم المركبة</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="lable">الصنف</td>
                    <td></td>
                    <td class="lable">الصنع</td>
                    <td></td>
                    <td class="lable">رقم القاعدة</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="lable">عدد الركاب</td>
                    <td></td>
                    <td class="lable">اللون</td>
                    <td class="lable"></td>
                    <td class="lable">الشكل</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="lable">الارتفاع</td>
                    <td></td>
                    <td class="lable">نوع الوقود</td>
                    <td class="lable"></td>
                    <td class="lable">رقم المحرك</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td></td>
                    <td>سنة الصنع</td>
                    <td></td>
                    <td>الترخيص</td>
                </tr>
                <tr>
                    <td></td>
                    <td>الصنف</td>
                    <td></td>
                    <td>الصنع</td>
                </tr>
                <tr>
                    <td></td>
                    <td>عدد الركاب</td>
                    <td></td>
                    <td>اللون</td>
                </tr>
                <tr>
                    <td></td>
                    <td>الارتفاع</td>
                    <td></td>
                    <td>نوع الوقود</td>
                </tr>
            </tbody>
        </table>
    </div>
    <button id="printPageButton">print</button>
</body>

</html>
