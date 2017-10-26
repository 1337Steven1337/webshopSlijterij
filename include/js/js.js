$(document).ready(function(){
    //Check hashchange
    showContent();
    window.onhashchange = function(){
        showContent();
    };
});

function showContent(){
        var hash = window.location.hash.substr(1);
        if(hash){
            $(".content").hide();
            $("."+hash+"Container").show();
        }
}