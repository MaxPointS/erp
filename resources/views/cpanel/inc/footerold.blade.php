


 <footer class="main-footer">
     <!-- To the right -->
     <div class="pull-right hidden-xs">
         Anything you want
     </div>
     <!-- Default to the left -->
     <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
 </footer>

 <!-- Control Sidebar -->
 <!-- <aside class="control-sidebar control-sidebar-dark">
     Create the tabs
     <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
         <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
     </ul>
     Tab panes 
     <div class="tab-content">
          Home tab content 
         <div class="tab-pane active" id="control-sidebar-home-tab">
             <h3 class="control-sidebar-heading">Recent Activity</h3>
             <ul class="control-sidebar-menu">
                 <li>
                     <a href="javascript::;">
                         <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                         <div class="menu-info">
                             <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                             <p>Will be 23 on April 24th</p>
                         </div>
                     </a>
                 </li>
             </ul>
            

             <h3 class="control-sidebar-heading">Tasks Progress</h3>
             <ul class="control-sidebar-menu">
                 <li>
                     <a href="javascript::;">
                         <h4 class="control-sidebar-subheading">
                             Custom Template Design
                             <span class="label label-danger pull-right">70%</span>
                         </h4>

                         <div class="progress progress-xxs">
                             <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                         </div>
                     </a>
                 </li>
             </ul>
            
         </div>
       
        
         <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
       
        
         <div class="tab-pane" id="control-sidebar-settings-tab">
             <form method="post">
                 <h3 class="control-sidebar-heading">General Settings</h3>

                 <div class="form-group">
                     <label class="control-sidebar-subheading">
                         Report panel usage
                         <input type="checkbox" class="pull-right" checked>
                     </label>

                     <p>
                         Some information about this general settings option
                     </p>
                 </div>
              
             </form>
         </div>
        
     </div>
 </aside> -->
 <!-- /.control-sidebar -->
 <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 2.2.0 -->




 <script src="{{ asset('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
 <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('dist/js/app.min.js') }}"></script>
 <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>



 {{-- <script src="//code.jquery.com/jquery-3.5.1.js"></script> --}}
 <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 <script src="//cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>



 {{--  rgthyjklj;klkjhytrg --}}

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.bootstrap4.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.colVis.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>




 <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


 {{-- 
 <script src="{{url('plugins/chartjs/chart.js')}}"></script>
 <script src="{{url('plugins/chartjs/customechart.js')}}"></script> --}}


 <script>
     $(document).ready(function() {


         $('.table tfoot tr')
             .clone(true)
             .addClass('filters')
             .appendTo('.table tfoot');

         var table = $('.table').DataTable({
             resize: true,
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'excel', 'pdf', 'print'
             ],
             orderCellsTop: true,
             fixedHeader: true,
             initComplete: function() {
                 var api = this.api();

                 // For each column
                 api.columns().eq(0)
                     .each(function(colIdx) {
                         // Set the header cell to contain the input element
                         var cell = $('.filters th').eq(
                             $(api.column(colIdx).header()).index()
                         );
                         var title = $(cell).text();
                         $(cell).html(
                             '<input type="text" class="text-center" style="width:100%;" placeholder="' +
                             title + '" />');

                         // On every keypress in this input
                         $(
                                 'input',
                                 $('.filters th').eq($(api.column(colIdx).header()).index())
                             )
                             .off('keyup change')
                             .on('change', function(e) {
                                 // Get the search value
                                 $(this).attr('title', $(this).val());
                                 var regexr =
                                 '({search})'; //$(this).parents('th').find('select').val();

                                 var cursorPosition = this.selectionStart;
                                 // Search the column for that value
                                 api
                                     .column(colIdx)
                                     .search(
                                         this.value != '' ?
                                         regexr.replace('{search}', '(((' + this.value +
                                             ')))') :
                                         '',
                                         this.value != '',
                                         this.value == ''
                                     )
                                     .draw();
                             })
                             .on('keyup', function(e) {
                                 e.stopPropagation();

                                 $(this).trigger('change');
                                 $(this)
                                     .focus()[0]
                                     .setSelectionRange(cursorPosition, cursorPosition);
                             });
                     });
             },
         });
         // });




         $(".select2").select2();

         //   $('.table').DataTable();
         //  $('.table').DataTable({
         //      resize:true,
         //      dom: 'Bfrtip',
         //      buttons: [
         //          'copy', 'excel', 'pdf', 'print'
         //      ]
         //  });

         //  $("#table1").DataTable({
         //      resizable: true,
         //      dom: 'Bfrtip',
         //      buttons: [
         //          'copy', 'excel', 'pdf', 'print'
         //      ]
         //  });

         //  $("#table2").DataTable({
         //      resizable: true,
         //      dom: 'Bfrtip',
         //      buttons: [
         //          'copy', 'excel', 'pdf', 'print'
         //      ]
         //  });

         //  $('#tablearea').DataTable({
         //      dom: 'Bfrtip',
         //      buttons: [
         //          'copy', 'excel', 'pdf', 'print'
         //      ]
         //  });


         $('input.timepicker').timepicker({});
         $('input.timepicker2').timepicker({});
     });

     function SaveArea() {
         let GovID = $("#AreasID").val();
         let Ararea = $("#ArAreaName").val();
         let Enarea = $("#EnAreaName").val();
         let Pranch = $("#PranchID").val();
         let token = "{{ csrf_token() }}";
         if (parseInt(GovID) === 0) {
             alert("إختر المحافظة");
             return;
         }
         if (Enarea === '' || Ararea === '') {
             alert("اسم المنطقة مطلوب");
             return;
         }
         $.ajax({
             method: "Post",
             url: '{{ url('cpanel/areas') }}',
             data: {
                 Gov: GovID,
                 Arar: Ararea,
                 Enar: Enarea,
                 prch: Pranch,
                 _token: token
             },
             datatype: "json",
             success: function(res) {
                 if (res === 'saved') {
                     alert("تم الحفظ");
                     console.log(res);
                     $("#AreasID").val("0");
                     $("#ArAreaName").val("");
                     $("#EnAreaName").val(""); //AreasModel
                     $("#AreasModel").modal("hide"); //
                     location.reload();
                 } else {
                     alert("error");
                 }
             },
             error: function(err) {
                 console.log(err);
             }
         });

     }
 </script>
 </body>

 </html>
