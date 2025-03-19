$(document).ready(function() {

    fetch_article();

    $(document).on('click', '#btn_saveArticle', function(){
        this.disabled = true;
        add_article();
    });

    function fetch_article()
    {
        
        var dataTable = $('#articleTable').DataTable({
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
                url:"../data/article/fetch_article.php",
                type:"POST"
            }
        });
    }

    function add_article()
    {
        var articleID = $('#ip_articleID').val();
        var articlename = $('#ip_articlename').val();
        var articleDescription = $('#ta_description').val();
        var ekNET = $('#ip_eknet').val();
        var vkNET = $('#ip_vknet').val();
        var tax = $('#ip_tax').val();
        var unit = $('#ta_unit').val();

        $.ajax({
            url: "/data/article/addArticle.php",
                    method: "POST",
                    data: { articleID:articleID, articlename:articlename, articleDescription:articleDescription, ekNET:ekNET, vkNET:vkNET, tax:tax, unit:unit },
                    success: function (data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        location.reload();
                    },
                    error: function () {
                        alert('Fehler - bitte Firma WolfTech kontaktieren');
                    },
        });
        setInterval(function () {
            $('#alert_message').html('');
        }, 5000);
    }

});