// function data_provinsi()
// {
//   $.post('provinsi', function(data0) {
//     var provinsi_data = JSON.parse(data0);
//
//     for (var i = 0; i < provinsi_data.length; i++) {
//       var select_pro = "<option value='"+provinsi_data[i]['id']+"'>"+provinsi_data[i]['nama']+"</option>";
//       $('#provinsi').append(select_pro);
//     }
//   });
// }

$(function() {
  $('#provinsi').change(function() {
    var provinsi = $('#provinsi').val();
    $('#kabkota').empty();
    data_kabkota (provinsi);
  });
  $("#kabkota").change(function() {
      var kabkota = $("#kabkota").val();
      $("#kecamatan").empty();
      data_kecamatan(kabkota);
  });

  function data_kabkota (a)
  {
    $.post('kabkota',{id_provinsi : a}, function(data1)
    {
      var data_arr = JSON.parse(data1);
      for (var i = 0; i < data_arr.length; i++) {
        var select = "<option value='"+data_arr[i]['id']+"'>"+data_arr[i]['nama']+"</option>";
        $('#kabkota').append(select);
      }
    });
  }
  function data_kecamatan (a)
  {
    $.post('kecamatan',{id_kecamatan : a}, function(data) {
      var data = JSON.parse(data);

      for (var i = 0; i < data.length; i++) {
        var select = "<option value='"+data[i]['id']+"'>"+data[i]['nama']+"</option>";
        $("#kecamatan").append(select);
      }
    });
  }
});