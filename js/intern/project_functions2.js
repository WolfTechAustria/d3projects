$(document).ready(function() {

    fetch_projects();

    function fetch_projects()
    {
        
        var dataTable = $('#projectsTable').DataTable({
            "processing" : true,
            "serverSide" : true,
            "searching":true,
            "paging":true,
            "info":true,
            "ordering": true,
            "responsive": true,
            "lengthMenu": [[-1,100,50,10], ["All","100","50","10"]],
            "order" : [],
            "columns" : [null, null, {visible: false}, null],
            "ajax" : {
                url:"../data/projects/fetch_projects.php",
                type:"POST"
            }
        });
    }


$(document).on('click', '#btn_saveProject', function(){

    this.disabled = true;

    var projectID = $('#projectID').val();
    var projectName = $('#projectName').val();
    var customerName = $('#customerID').val();
    var customerStreet = $('#customerStreet').val();
    var customerCity = $('#customerCity').val();
    var customerZIP = $('#customerZIP').val();
    var customerCountry = $('#customerCountry').val();
    var customerPhone = $('#customerPhone').val();
   
   
   
        $.ajax({
            url:"../data/projects/save_project.php",
            method:"POST",
            data:{projectID:projectID, projectName:projectName, customerName:customerName, customerStreet:customerStreet, customerCity:customerCity, customerZIP:customerZIP, customerCountry:customerCountry, customerPhone:customerPhone},
            success:function(data)
            {
  
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                location.reload();
            }
        });
        setInterval(function(){
            $('#alert_message').html('');
        }, 5000);

    document.getElementById("ModalCreateProject").style.display = "none";
    
  });

});
