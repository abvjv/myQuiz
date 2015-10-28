/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Set BG Image height
$(document).ready(function(){
    $("#bg-img-container").css("height",$(window).height());
    
    
    
    $('.answer').click(function(){
        
        $('.answer').removeClass('btn-info').addClass('btn-primary');
        $(this).removeClass('btn-primary').addClass('btn-info');        

    });
});

