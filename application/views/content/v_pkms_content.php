<div class="panel panel-success">
  <div class="panel-heading"></div>
  <div class="panel-body">
  <div id="chart"></div>
  </div>
</div>


<script>
  $(document).ready(function()
  {
    $.ajax({
      url:base_url+'c_pkms_home/getchart',
      success:function(result)
      {
        console.log(result);
        console.log(JSON.parse(result));
        Morris.Line(
        {
          element:'chart',
          data:JSON.parse(result),
          xkey:'x',
          ykeys:['y'],
          labels:['Nilai'],
          xLabels:['month'],
          parseTime:false,
          hidehover:'auto',
          resize:true
        });
      }
    });
  })
</script>