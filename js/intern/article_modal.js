// Get the modal "Article"
var modal2 = document.getElementById("ModalAddArticle");

// Get the button that opens the modal
var btn2 = document.getElementById("opn_ModalCreateArticle");
var btn3 = document.getElementById("btn_abort");

// Get the <span> element that closes the modal
var span2 = document.getElementById("close");

// When the user clicks on the button, open the modal
btn2.onclick = function() {
  console.log('test');
  modal2.style.display = "block";
}

btn3.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}