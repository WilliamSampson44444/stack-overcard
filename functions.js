var script = document.createElement('script');
 
script.src="https://code.jquery.com/jquery-3.3.1.min.js";
document.getElementsByTagName('head')[0].appendChild(script); 

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    //document.getElementsByTagName("body").style.marginLeft= "250";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    //document.getElementsByTagName("body").style.marginLeft= "0";
}

$("#decks").change(function(){
    $.ajax({

        type: "GET",
        url: "getDecks.php",
        dataType: "json",
        data: { "username": $("#username").val() },
        success: function(data,status) {
        
            alert(data);
            
            //Do things - populate sidebar?
        
        },
        complete: function(data,status) { //optional, used for debugging purposes
            alert(status);
        }
        
    });
});