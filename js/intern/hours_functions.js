$(document).ready(function() {

    fetch_hours();

    function fetch_hours()
    {
        
        var dataTable = $('#hoursTable').DataTable({
            "processing" : true,
            "serverSide" : true,
            "searching":true,
            "paging":true,
            "info":true,
            "ordering": true,
            "responsive": true,
            "lengthMenu": [[-1,100,50,10], ["All","100","50","10"]],
            "order" : [],
            "ajax" : {
                url:"../data/hours/fetch_hours.php",
                type:"POST"
            }
        });
    }

});
