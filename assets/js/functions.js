/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Set BG Image height
$(document).ready(function(){
    $("#bg-img-container").css("height",$(window).height());
    
    
    //Multiple Choice
    // Highlight chosen Answer
    $('.answer').click(function(){
        
        $('.answer').removeClass('btn-info').addClass('btn-primary');
        $(this).removeClass('btn-primary').addClass('btn-info');       
        
        // Choose Answer Radio
        var answerId = $(this).attr('id');
        answerId = answerId.substring(6);
        
        //get questionId from surrounding Container
        var questionId = $(this).closest('.mcContainer').attr('id');
        questionId = questionId.substring(11);
        
        //get and set RadioButton checked
        var checkbox = '#q' + questionId + 'answer' + answerId;
        $(checkbox).prop('checked', true);

        //$(console.log(answerId));
    });
     
    //Confirm Answer
    $('.confirmAnswer').click(function(){
       //get QuestionId
       var answerId = $(this).attr('id');
       answerId =  parseInt(answerId.substring(7));
       
        //get QuestionId
       var questionId = $(this).closest('.mcContainer').attr('id');
       questionId = questionId.substring(11);

       // check if an answer was choosen
       if(!$("input[name='question_"+questionId + "']:checked").val()){
            alert('Please choose one answer');
       } else{
           // hide current question
            $(this).closest('.mcContainer').hide('slow');
           
           //add to get next Container
            intQId = parseInt(questionId)+1;
          
            var next = '#mcContainer' + intQId;
           
           //check if there is another question
            if($(this).closest('.mcContainer').siblings(next).length){
               //show next question
                $(this).closest('.mcContainer').siblings(next).show('slow');
            } else{
           // show next question
                $('#mcSubmit').show('slow');
            }
       }

    });
    
    $('.vocConfirmAnswer').click(function(){
        //get QuestionId
       var sectionId = $(this).attr('id');
       sectionId =  parseInt(sectionId.substring(10));
       
       var vocId = '#vocContainer' + sectionId;
       
       $(vocId).hide('slow');
       
       var next = sectionId+1;
       
       var nextVocCon = '#vocContainer' + next;
       //check if there is another question
        if($(this).closest('.vocContainer').siblings(nextVocCon).length){
               //show next question
                $(this).closest('.vocContainer').siblings(nextVocCon).show('slow');
            } else{
           // show next question
                $('#vocSubmit').show('slow');
            }
       
    });
    
});


