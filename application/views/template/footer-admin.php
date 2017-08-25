<script src="<?php echo base_url("web/js-admin/jquery-1.11.1.min.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/chart.min.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/chart-data.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/easypiechart.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/easypiechart-data.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/bootstrap-datepicker.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/custom.js"); ?>"></script>
<script src="<?php echo base_url("web/js-admin/bootstrap-table.js"); ?>"></script>
<script src="<?php echo base_url("web/js/tinymce/tinymce.min.js"); ?>"></script>
<script src="<?php echo base_url("web/js/jquery.maskMoney.min.js"); ?>"></script>
<script src="<?php echo base_url("web/js/Region.js"); ?>"></script>
<script>
  $('#harga').maskMoney({thousands: '.', decimal: ',', precision:0});

  tinymce.init({
    selector: 'textarea',
    height: 200,
    image_advtab:true,
    menubar:true,
    plugins:
      'advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools',
    toolbar:[
      'undo redo | bold italic | alignleft aligncenter alignjustify | bullist numlist outdent indent',
      'forecolor backcolor | fontselect fontsizeselect'
    ]
  });

window.onload = function(){
  var chart1 = document.getElementById("line-chart").getContext("2d");
  window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive : true,
    scaleLineColor: "rgba(255,255,255,.2)",
    scaleGridLineColor: "rgba(255,255,255,.05)",
    scaleFontColor: "#ffffff"
  });
  var chart2 = document.getElementById("bar-chart").getContext("2d");
  window.myBar = new Chart(chart2).Bar(barChartData, {
    responsive : true,
    scaleLineColor: "rgba(255,255,255,.2)",
    scaleGridLineColor: "rgba(255,255,255,.05)",
    scaleFontColor: "#ffffff"
  });
  var chart5 = document.getElementById("radar-chart").getContext("2d");
  window.myRadarChart = new Chart(chart5).Radar(radarData, {
    responsive : true,
    scaleLineColor: "rgba(255,255,255,.05)",
    angleLineColor : "rgba(255,255,255,.2)"
  });
};
!function ($) {
  $(document).on("click","ul.nav li.parent > a > span.icon", function(){
    $(this).find('em:first').toggleClass("glyphicon-minus");
  });
  $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
}(window.jQuery);

$(window).on('resize', function () {
  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})
</script>
</body>
</html>
