<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script src="js/libs/jquery.formalize.js"></script>
<script src="js/libs/webshim/polyfiller.js"></script>
<script src="js/libs/sorttable.js"></script>
<script>
//thank you based polyfill
if(!Modernizr.input.placeholder || !Modernizr.input.autofocus || !Modernizr.inputtypes.email ){
	$.webshims.polyfill('forms');
}
</script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->
