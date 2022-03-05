function activatemailto(css)
{
		var alist = $(css);
		for(var c=0; c<alist.length; c++)
		{
				var mto = $(alist[c]).attr('href');
				var newmto = mto.replace(/\.infocanada\.infocanada@/,'@');
				$(alist[c]).attr('href',newmto);
		}
}
$(document).ready(function() {  
   	activatemailto('.mailto-link');
});