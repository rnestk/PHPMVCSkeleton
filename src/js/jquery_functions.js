/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    animacja();
});

function animacja() {
    animacja_jeden();
}

function animacja_jeden() {
    $('#logo').delay(1000).animate({top: '0px', left: '0px'}, 2000, 'easeOutElastic'
            , function() {
                animacja_dwa();
            })
            .delay(9000).animate({top: '0px',
        left: '-200px'}, 2000, 'easeInBack');
}


function animacja_dwa() {
    $('#haslo').animate({top: '-90px', left: '210px'}, 2000, 'easeOutBounce'
            , function() {
                animacja_trzy();
            }).delay(8500).animate({top:
                '-90px', left: '750px'}, 2000, 'easeInBack');
}

function animacja_trzy() {
    $('#tekst').animate({top:
                '-90px', left: '225px'}, 900, 'easeInCirc'
            , function() {
                animacja_cztery();
            })
            .delay(8000).animate({top: '10px', left: '225px'}
    , 2000, 'jswing');
}

function animacja_cztery() {
    $('#przycisk').animate({top: '-140px', left: '670px'}
    , 900, 'easeInQuint',
            function() {
                animacja();
            })
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({opacity: '.5'}, 500)
            .animate({opacity: '1'}, 500)
            .animate({top: '-140px', left: '750px'}, 500, 'jswing');
}


