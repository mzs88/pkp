$(document).ready(function()
{

	Morris.Line(
	{
		element:'chart',
		data:[{y:'Januari',x:'10'},{y:'Januari',x:'10'},{y:'Januari',x:'10'},{y:'Januari',x:'10'},{y:'Januari',x:'10'},{y:'Januari',x:'10'},{y:'Januari',x:'10'},],
		xkey:'y',
		ykeys:['y'],
		labels:['y'],
		hidehove:'auto',
		resize:true
	})
})