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
        beforeSend: function() {
            $('#content').fadeOut(500);
        },
        success: function(data)
        {
            $('#content').hide().html(data).fadeIn(500);
        } 
    });
}

function getCards(deckName){
    $.ajax({
        url: 'getCards.php',
        type:'POST',
        dataType: 'text',
        data: {deck: deckName},
        beforeSend: function() {
            $('#content').fadeOut(500);
        },
        success: function(data)
        {
            $('#content').hide().html(data).fadeIn(500);
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
            $('.modal-body').hide().html(data).fadeIn(500);
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
            $('#upvote' + aID).hide().html('<i class="fa fa-arrow-up" style="font-size:36px;color:orange;"></i>').fadeIn(500);
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
            $('#downvote' + aID).hide().html('<i class="fa fa-arrow-down" style="font-size:36px;color:blue;"></i>').fadeIn(500);
        } 
    });
}

function submitAnswer(){
    
    console.log($('#comment').val(), document.getElementById("card_id").innerHTML);
    var data = {comment: $('#comment').val(), card_id: document.getElementById("card_id").innerHTML};
    $.ajax({
        url: 'submitAnswer.php',
        type: 'POST',
        data: data,
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

function getMyAnswers(cardName){
    $.ajax({
        url: 'getMyAnswers.php',
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

function deleteComment(answID){
    $.ajax({
        url: 'deleteComment.php',
        type: 'POST',
        data: {answer_id: answID},
        success: function(data) {
            console.log(data);
        }
    });
    getMyAnswers(document.getElementById("card_id").innerHTML);
    return false;
}