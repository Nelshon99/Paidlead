 <!-- Page Footer Start -->
 <?php include "modals/modales.php";?>

 <!--================================-->
 <footer class="page-footer">
     <div class="pd-t-4 pd-b-0 pd-x-20">
         <div class="tx-10 tx-uppercase">
             <p class="pd-y-10 mb-0">Copyright&copy; 2021 | All rights reserved. | Created By <a href="#"
                     target="_blank">PAIDLEAD</a></p>
         </div>
     </div>
 </footer>
 <!--/ Page Footer End -->
 </div>
 <!--/ Page Content End -->
 </div>
 <!--/ Page Container End -->
 <!--================================-->
 <!-- Scroll To Top Start-->
 <!--================================-->
 <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

 <!-- Footer Script -->
 <!--================================-->
 <script src="assets/plugins/jquery/jquery.min.js"></script>
 <script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
 <script src="assets/plugins/popper/popper.js"></script>
 <script src="assets/plugins/feather-icon/feather.min.js"></script>
 <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
 <script src="assets/plugins/pace/pace.min.js"></script>
 <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="assets/plugins/datatables/responsive/dataTables.responsive.js"></script>
 <script src="assets/plugins/datatables/extensions/dataTables.jqueryui.min.js"></script>
 <script src="assets/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>
 <script src="assets/js/jquery.slimscroll.min.js"></script>
 <script src="assets/js/highlight.min.js"></script>
 <script src="assets/js/app.js"></script>
 <script src="assets/js/custom.js"></script>

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script src="js/editarProducto.js"></script>
 <script src="js/eliminar_variante.js"></script>
 <script src="js/editarUsuarios.js"></script>
 <script src="js/agregarProducto.js"></script>


 <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>


 <script>
// Basic DataTable	
$('#basicDataTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar productos...',
        sSearch: ''
    },
    "order": [
        [1, "desc"]
    ],
    "scrollY": "250px",
    "scrollCollapse": true,
    "paging": false
});

$('#basicDataTable2').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar clientes...',
        sSearch: ''
    },
    "order": [
        [1, "desc"]
    ],
    "scrollY": "250px",
    "scrollCollapse": true,
    "paging": false
});
$('#basicDataTable3').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar compras...',
        sSearch: ''
    },
    "order": [
        [1, "desc"]
    ],
    "scrollY": "250px",
    "scrollCollapse": true,
    "paging": false
});
 </script>





 </body>


 </html>