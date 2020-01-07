/*LIKE ACTION*/
function like(id, t) {
    console.log("like to " + id);
    //var likes = this.text;
    //likes = t.replace( /^\D+/g, '');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            var response = this.responseText;
            if(response=="nouser"){
                console.log(response);
                document.getElementById("alert").style.display="block";
            }
            else if(response == "Hecho"){
                console.log(response);
                t.style.color = "#fff";
                t.style.background = '#000';
                t.innerHTML = "Me gusta " + (Number(t.text.replace( /^\D+/g, ''))+1);
            }
            else if(response == "removed"){
                console.log(response);
                t.style.color = "#000";
                t.style.background = 'rgba(0,0,0,0.2)';
                t.innerHTML = "Me gusta " + (Number(t.text.replace( /^\D+/g, ''))-1);
            }
            
            console.log(response);
            //this.getElementById("countLikes").innerHTML=Number(likes)+1;
        }
    };

    xmlhttp.open("POST", "zi/setLikeZI.php?id=" + id, true);
    xmlhttp.send();
}
/*SHARE ACTION*/

var modal = document.getElementById("alert");

// Get the button that opens the modal


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
function CloseBox() {
    document.getElementById("alert").style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    document.getElementById("alert").style.display = "none";
  }
} 