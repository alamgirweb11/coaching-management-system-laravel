//Password Type Change Code Start
$(document).ready(function () {
    $("#passwordToggle").click(function () {
        var checkClass = $("#passwordToggle i").hasClass('fa-eye-slash');
        var typeCheck = $("#password").attr('type');

        if (checkClass && typeCheck == 'password'){
            $("#password").attr('type','text');
            $("#passwordToggle i").removeClass('fa-eye-slash').addClass('fa-eye');
        }else{
            $("#password").attr('type','password');
            $("#passwordToggle i").removeClass('fa-eye').addClass('fa-eye-slash');
        }
    });
});
//Password Type Change Code End

//Data Table Start
$(document).ready(function() {
    $('#example').DataTable({
        fixedHeader:true
    });
} );
//Data Table End

//Magnific Popup Start
$(document).ready(function() {
    $('.image-link').magnificPopup({
        type:'image',
        gallery:{
            enabled: true,
            navigateByImgClick: true,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>',
        },
        mainClass: 'mfp-with-zoom',
        zoom:{
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
        },
        preloader: true,
        showCloseBtn:true
    });
});
//Magnific Popup End

//Owl Carousel Configuration Start
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        navText:['prev','next'],
        autoplay:true,
        loop:true,
        smartSpeed:1000,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        margin:0,
        center:true,
        responsiveRefreshRate:200,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            }
        }
    });
} );
//Owl Carousel Configuration End
//Image Show Before Upload Start
$(document).ready(function(){
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        if (fileName){
            $('#fileLabel').html(fileName);
        }
    });
});

function showImage(data, imgId){
    if(data.files && data.files[0]){
        var obj = new FileReader();

        obj.onload = function(d){
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        }
        obj.readAsDataURL(data.files[0]);
    }
}
//Image Show Before Upload End

//Loader javaScript Code start

var overlay = document.getElementById("overlay");

window.addEventListener('load', function(){

    overlay.style.display = 'none';

});
//Loader javaScript Code end
