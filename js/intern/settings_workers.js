$(document).ready(function() {

    fetch_workers();

    function fetch_workers()
    {        
        var dataTable = $('#workersTable').DataTable({
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
                url:'../../data/settings/fetch_workers.php',
                type:"POST"
            }
        });
    }



});