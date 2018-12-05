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

function getDecks(){
    $.ajax({
        url: 'getDecks.php',
        type:'POST',
        dataType: 'text',
        data: {test: '1'},
        success: function(data)
        {
            $('#content').html(data);
        } 
    });
}

function getCards(id){
    $.ajax({
        url: 'getCards.php',
        type:'POST',
        dataType: 'text',
        data: {id: id},
        success: function(data)
        {
            $('#content').html(data);
        } 
    });
}