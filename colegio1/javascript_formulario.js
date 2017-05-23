
$(document).ready(function () {
            $.fn.dataTable.moment('D-M-Y');
            
            var table = $('#example').dataTable({
              "colReorder": true,
           
              "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
              "lengthMenu": [10, 2, 3, 5, 10, 20]
      
            });
        
});






