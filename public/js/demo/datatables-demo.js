// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    pagingType: 'numbers',
    
  });
  $.fn.dataTable.ext.classes.sPageButton = 'btn btn-success';
  
});
