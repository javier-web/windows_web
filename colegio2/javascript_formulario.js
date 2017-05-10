$(document).ready(function () {
            $.fn.dataTable.moment('D-M-Y'),
                    $('#example').dataTable({
            "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
                    "lengthMenu": [20,1, 2, 3, 5, 10, 20]
            });
            });

$(document).ready(function () {

    var table = $('#example').DataTable({
        colReorder: true
    });

    $('#reverse').click(function (e) {
        table.colReorder.order([5, 4, 3, 2, 1, 0]);
    });


    var table = $('#example').DataTable({
        colReorder: true
    });

    $('#reverse').click(function (e) {
        table.colReorder.order([0, 1, 2, 3, 4, 5], true);
    });

});



            
            /*$(document).ready(function () {
             var table = $('#example').DataTable({
             "responsive": true,
             "columns": [
             {"id"},
             {"curso_id": 0},
             {"nombre": 1},
             {"apellidos": 2},
             {"fecha_nacimiento": 4},
             {"nota": 3},
             {"foto": 5}
             ]
             });
             });
             */