// Get the modal "Hours"
var modal2 = document.getElementById("ModalAddHours");
var modalArticleToProject = document.getElementById("ModalAddArticleToProject");

// Get the button that opens the modal
var btn2 = document.getElementById("opn_ModalAddHours");
var btn3 = document.getElementById("btn_abort");
var btn_openModalArticleToProject = document.getElementById("opn_ModalAddArticleToProject");
var btn_abortAddArticle = document.getElementById("btn_abortAddArticle");

// Get the <span> element that closes the modal
var span2 = document.getElementById("close");




btn3.onclick = function() {
    modal2.style.display = "none";
}

btn_abortAddArticle.onclick = function() {
    modalArticleToProject.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
  modalArticleToProject.style.display = "none";
}

$("#ip_HoursStart").change(calc);
$("#ip_HoursEnd").change(calc);
$("#btn_saveHours").click(saveHours);
$("#btn_saveAddArticleToProject").click(saveArticle);

function calc()
{
    var start = new Date().toDateString("yyyy-MM-dd") + " " + document.getElementById("ip_HoursStart").value;   //convert String to Date
    var end = new Date().toDateString("yyyy-MM-dd") + " " + document.getElementById("ip_HoursEnd").value;
    var hours = (new Date(end) - new Date(start)) / 60 / 60 / 1000;

    document.getElementById("ip_Hours").value = hours;
}

function saveHours()
{   
    var projectID = $('#ip_projectID').val();
    var employeeID = $("#employeelist").val();
    var date = $('#ip_HoursDate').val();
    var startTime = $('#ip_HoursStart').val();
    var endTime = $('#ip_HoursEnd').val();
    var description = $('#ta_description').val();

    $.ajax({
        url: "/data/hours/addHours.php",
                method: "POST",
                data: { projectID:projectID, employeeID:employeeID, date:date, startTime:startTime, endTime:endTime, description:description },
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

function saveArticle()
    {
        var projectID = $('#ip_projectID').val();
        var articleName = $('#ip_article').val();
        var articleID = document.querySelector("#articleList option[value='" + articleName + "']").dataset.value;
        var amount = $('#ip_amount').val();
        var articleDescription = $('#ta_addArticleDescription').val();
        var date = $('#ip_projectArticleDate').val();
        
        $.ajax({
            url: "/data/article/addArticleToProject.php",
                    method: "POST",
                    data: { projectID:projectID, articleID:articleID, amount:amount, articleDescription:articleDescription, articleName:articleName, date:date},
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
