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
            console.log(data);
            $('#modal-answers').html(data);
        } 
    });
}

function upvote(cardID, answerID){
    $.ajax({
        url: 'upvote.php',
        type:'POST',
        dataType: 'text',
        data: {cardID: cardID, answerID: answerID},
        success: function(data){
            $('#answerID').html(data)
        } 
    });
}

function downvote(cardID, answerID){
    $.ajax({
        url: 'downvote.php',
        type:'POST',
        dataType: 'text',
        data: {cardID: cardID, answerID: answerID},
        success: function(){
            
        } 
    });
}

$(document).ready(function(){
    $('#submit-comment').click( function() {
        $.ajax({
            url: 'submitAnswer.php',
            type: 'post',
            dataType: 'json',
            data: $('#comment').serialize(),
            success: function(data) {
            
            }
        });
    });
});