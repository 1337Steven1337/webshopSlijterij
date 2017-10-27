$(document).ready(function(){
    if(document.cookie.indexOf("checkedAge=") <= 1)
        $("#ageModal").modal();

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
            $(".nav-active").removeClass("active");
            $(".nav-"+ hash).addClass("active");
        }
}

function setAgeCheck(){
    document.cookie = "checkedAge=1";
}