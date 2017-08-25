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
// var URL = window.location.origin + '/';
// URL += window.location.pathname.split('/')[1] + '/';
var URL = window.location.origin.replace('m.', 'www.');
$(function() {
  $('#provinsi').change(function() {
    var provinsi = $('#provinsi').val();
    $('#kabkota').empty();
    data_kabkota(provinsi);
  });
  $('#kabkota').change(function() {
      var kabkota = $('#kabkota').val();
      $('#kecamatan').empty();
      data_kecamatan(kabkota);
    });

  function data_kabkota(a) {
    $.post(URL + 'kabkota', {id_provinsi: a}, function(data1) {
      var datakota = JSON.parse(data1);
      for (var i = 0; i < datakota.length; i++) {
        var select = '<option value=' + datakota[i].id + '>' +
        datakota[i].nama + '</option>';
        $('#kabkota').append(select);
      }
    });
  }
  function data_kecamatan(a) {
    $.post(URL + 'kecamatan', {id_kecamatan: a}, function(data) {
      var datakec = JSON.parse(data);
      for (var i = 0; i < datakec.length; i++) {
        var select = '<option value=' + datakec[i].id + '>' +
        datakec[i].nama + '</option>';
        $('#kecamatan').append(select);
      }
    });
  }
});
