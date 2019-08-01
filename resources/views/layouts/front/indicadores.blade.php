<div class="row">
	<div class="col-md-12 d-flex justify-content-center">
		<!-- Dolar Wilkinsonpc Ind-Eco-Basico Start -->
		<!-- DolarWeb IndMin Start -->
		<div id="IndicadoresMin">
			<h2><a href="https://dolar.wilkinsonpc.com.co/">Dolar Hoy Colombia</a></h2>
		</div>
		<script type="text/javascript">
			valIndicadoresMin=document.getElementById('IndicadoresMin');
if (valIndicadoresMin)
	{
	var valCode = 'no';
	if (!valIndicadoresMin.links)
		{
		valIndicadoresMin.links = valIndicadoresMin.getElementsByTagName('a');
		}
	for (var t=0; t<valIndicadoresMin.links.length; t++)
		{
		var valProv = valIndicadoresMin.links[t];
		
		if (valProv.href.search('http://dolar.wilkinsonpc.com.co/') != -1 || valProv.href.search('https://dolar.wilkinsonpc.com.co/') != -1) {
			if(valProv.getAttribute('rel') == 'nofollow')
				{
				} else {
				valCode='si'; break;
				} 
			} 
		}
	}

if(valIndicadoresMin&&valCode=='si')
{
while(valIndicadoresMin.firstChild){valIndicadoresMin.removeChild(valIndicadoresMin.firstChild)};
valIndicadoresMin.style.cssText='background:transparent;background-color:transparent;overflow:hidden;';
marko=document.write('<iframe SRC="https://dolar.wilkinsonpc.com.co/widgets/gratis/indicadores-economicos-min.html?ancho=170&alto=85&fondo=transparent&fsize=10&ffamily=sans-serif&fcolor=000000&custom=" id="IEDolar" style="width:270px;height:85px;" title="Dolar" width="170" height="85" ALIGN="top" frameborder="0" marginwidth=0 marginheight=0 SCROLLING=no name="IE-1" allowtransparency="true"></iframe>');
marko=document.createElement('font');
marko.id='check';
valIndicadoresMin.appendChild(marko);
}
else {
alert("ERROR: INDICADORES ECONOMICOS\n------------------------------------------------------------------------\nEl codigo introducido no es correcto\nVerifica tu codigo en: https://dolar.wilkinsonpc.com.co/indicadores-economicos-dolar.html\n\n* Recuerda que no se permite editar el codigo.\n\n- Copialo tal cual como aparece en nuestro sitio web.\n- Actualiza tu codigo por el mas reciente.");
}
		</script><!-- DolarWeb IndMin End -->
	</div>
</div>


<!-- Dolar Wilkinsonpc Ind-Eco-Basico End -->