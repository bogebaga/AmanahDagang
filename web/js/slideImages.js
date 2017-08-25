var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName('gambar-gambar');
  if (n > x.length) {slideIndex = 1;}
  if (n < 1) {slideIndex = x.length;}
  for (i = 0; i < x.length; i++) {x[i].style.display = 'none';
  }
  x[slideIndex - 1].style.display = 'block';
}

function loadImage(i, addr, w, h) {
  if (i.files && i.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#' + addr).attr('src', e.target.result).width(w).height(h);
    };

    reader.readAsDataURL(i.files[0]);
  }
}
