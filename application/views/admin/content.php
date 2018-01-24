<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
	<div id="chart"></div>
	</div>
</div>





<script>
	$(document).ready(function()
	{
		$.ajax({
			url:base_url+'admin/home/getdata',
			success:function(result)
			{
				console.log(result);
				console.log(JSON.parse(result));
				Morris.Bar(
				{
					element:'chart',
					data:JSON.parse(result),
					// data:[{"x":"Tlanakan","y":142778},{"x":"Bandaran","y":145921},{"x":"Pademawu","y":291639},{"x":"Sopaah","y":291639},{"x":"Galis","y":291639},{"x":"Larangan","y":291639},{"x":"Talang","y":291639},{"x":"Teja","y":291639},{"x":"Kowel","y":291639},{"x":"Proppo","y":291639},{"x":"Panaguan","y":291639}],
					xkey:'x',
					ykeys:['y'],
					labels:['Nilai'],
					hidehover:'auto',
					resize:true
				})
			}
		});

		// $.ajax(
		// 	{url:base_url+'home/getdata',
		// 	success:function(data)
		// 	{
		// 		Morris.Bar(
		// 		{
		// 			element:'chart',
		// 			data:data,
		//       xkey:'y',
		//       ykeys:['x'],
		//       labels:['anu'],
		//       hidehover:'auto',
		//       resize:true
		// 		})
		// 	}
		// 	)

		// Morris.Line({
	 //  element: 'chart',
	 //  data: [
	 //    { y: '2006', a: 100, b: 90 },
	 //    { y: '2007', a: 75,  b: 65 },
	 //    { y: '2008', a: 50,  b: 40 },
	 //    { y: '2009', a: 75,  b: 65 },
	 //    { y: '2010', a: 50,  b: 40 },
	 //    { y: '2011', a: 75,  b: 65 },
	 //    { y: '2012', a: 100, b: 90 }
	 //  ],
	 //  xkey: 'y',
	 //  ykeys: ['a', 'b'],
	 //  labels: ['Series A', 'Series B']
		// });
	})
</script>