/*global $*/

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
            $('.modal-body').html(data);
        } 
    });
}

function upvote(answer){
    $.ajax({
        url: 'upvote.php',
        type:'PUT',
        dataType: 'text',
        data: {answer: answerId},
        success: function()
        {
            
        } 
    });
}

function downvote(answer){
    $.ajax({
        url: 'downvote.php',
        type:'PUT',
        dataType: 'text',
        data: {answer: answerId},
        success: function()
        {
            
        } 
    });
}

$(document).ready(function(){
    $('#new-comment').submit( function(event) {
        event.preventDefault();
        
        var submission = [$('comment').serialize(), $('card_id').val()];
        
        $.ajax({
            url: 'submitAnswer.php',
            type: 'put',
            dataType: 'json',
            data: submission,
            contentType: "application/json",
            success: function(data) {
                console.log(data);
            }
        });
    });
});