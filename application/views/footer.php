<section class="bottom-menu-bg bg-ser">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <ul class="bottom-menu">
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <li class="copy">© Copyright, Arvind Tutorials Limited</li>
                </div>
            </div><!--col-md-12-->
        </div><!--row-->
    </div><!--container-->
</section>
<script>
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>
<script>

$('document').ready(function(){

function footeradj(){
var bdhei=$('body').height();
var fthei=$('.bottom-menu-bg').height();

if(window.innerHeight > bdhei){
$('.bottom-menu-bg').addClass("addftcls");
$(".addftcls").css("margin-top",'-'+fthei+"px")
}
else{
$('body').css("height","auto");
$('.bottom-menu-bg').removeClass("addftcls");
}

}
footeradj();
var footeradjvr=setInterval(footeradj,100);

})

</script>
	
<style type="text/css">
	
.addftcls{
	position: absolute !important;
	top: 100%;
	left: 0px;
	width: 100%;
}

</style>