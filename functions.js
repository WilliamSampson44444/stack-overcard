/*global $*/

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementsByClassName("closebtn")[0].style.cursor = "pointer";

    //document.getElementsByTagName("body").style.marginLeft= "250";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementsByClassName("closebtn")[0].style.cursor = "pointer";
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

function getCards(deckName){
    $.ajax({
        url: 'getCards.php',
        type:'POST',
        dataType: 'text',
        data: {deck: deckName},
        success: function(data)
        {
            $('#content').html(data);
        } 
    });
}

function getAnswers(cardName){
    $.ajax({
        url: 'getAnswers.php',
        type:'POST',
        dataType: 'text',
        data: {card: cardName},
        success: function(data)
        {
            //console.log(data);
            $('.modal-body').html(data);
        } 
    });
}

function upvote(cardID, answerID){
    console.log('checking if this is passed ');
    $.ajax({
        url: 'upvote.php',
        type:'POST',
        dataType: 'text',
        data: {cardID: cardID, answerID: answerID},
        
        success: function(data){
            // debug statement
             console.log('running ');
            var aID = answerID;
            $('#answer' + aID).html(data);
            $('#upvote' + aID).html('<i class="fa fa-arrow-up" style="font-size:36px;color:orange;"></i>');
        } 
    });
}

function downvote(cardID, answerID){
     $.ajax({
        url: 'downvote.php',
        type:'POST',
        dataType: 'text',
        data: {cardID: cardID, answerID: answerID},
        success: function(data){
            // debug statement
            console.log('running');
            var aID = answerID;
            $('#answer' + aID).html(data);
            $('#downvote' + aID).html('<i class="fa fa-arrow-down" style="font-size:36px;color:blue;"></i>');
        } 
    });
}

function submitAnswer(){
    
    console.log($('#comment').val(), document.getElementById("card_id").innerHTML);
    var data = {comment: $('#comment').val(), card_id: document.getElementById("card_id").innerHTML};
    $.ajax({
        url: 'submitAnswer.php',
        type: 'POST',
        dataType: 'text',
        data: data,
        
        //contentType: "application/json",

        success: function(data) {
            console.log(data);
        },
        complete: function(data,status) { //optional, used for debugging purposes
           alert(status);
        }
    });
    getAnswers(document.getElementById("card_id").innerHTML);
    return false;
}