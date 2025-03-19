$(document).ready(function() {

    fetch_customer();

    $(document).on('click', '#btn_saveCustomer', function(){
        this.disabled = true;
        add_customer();
    });

    function fetch_customer()
    {
        
        var dataTable = $('#customerTable').DataTable({
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
                url:"../data/customer/fetch_customer.php",
                type:"POST"
            }
        });
    }

    function add_customer(){

        var customerID = $('#tb_kundennr').val();
        var name = $('#tb_firstname').val();
        var surname = $('#tb_lastname').val();
        var companyname = $('#tb_company').val();
        var street = $('#tb_street').val();
        var zip = $('#tb_zip').val();
        var city = $('#tb_city').val();
        var country = $('#sb_country').val();
        var phone = $('#tb_phone').val();
        var email = $('#tb_email').val();
        var vat = $('#tb_vatCustomer').val();


        $.ajax({
            url:"../data/customer/add_customer.php",
            method:"POST",
            data:{customerID:customerID, name:name, surname:surname, companyname:companyname, street:street, zip:zip, city:city, country:country, phone:phone, email:email, vat:vat},
            success:function(data)
            {
  
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                location.reload();
            }
        });
        setInterval(function(){
            $('#alert_message').html('');
        }, 5000);
    }

 });