 //Call the dataTables jQuery plugin
 $(document).ready(function() {
   $('#dataTable').DataTable( {
     "language": {
       "lengthMenu": "Exibir _MENU_ registros por página",
       "zeroRecords": "Nada encontrado - desculpe",
       "info": "Exibindo página _PAGE_ de _PAGES_",
       "infoEmpty": "Nenhum registro disponível",
       "infoFiltered": "(filtered from _MAX_ total records)",
       "search":"Buscar",
     }
   } );
 });
