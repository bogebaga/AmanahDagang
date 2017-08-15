<footer>
  <div class="footer1">
    <ul class="footer-heading">
      <li><a href="<?php echo $network ?>">About Us</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">Privacy Policy</a></li>
      <li><a href="#">Aturan dan Ketentuan</a></li>
      <li><a href="#">Disclaimer</a></li>
      <li><a href="#">Tips Belanja</a></li>
    </ul>
    <div class="garis-footer"></div>
    <div class="social-media">
      <a href="https://www.facebook.com/profile.php?id=100019591120282" target="_blank">
        <div class="sprite-media facebook"></div>
      </a>
      <a href="https://plus.google.com/u/0/109458552857548437750" target="_blank">
        <div class="sprite-media googleplus"></div>
      </a>
      <a href="https://twitter.com/amanahstores" target="_blank">
        <div class="sprite-media twitter"></div>
      </a>
      <!-- <a href="#">
        <div class="sprite-media youtube"></div>
      </a> -->
      <a href="https://www.linkedin.com/in/amanah-stores-7630a8147/" target="_blank">
        <div class="sprite-media linkedin"></div>
      </a>
    </div>
    <div class="footer-law">
      <p>
        2017 HarianAmanah.com All Right Reserved
      </p>
    </div>
  </div>
</footer>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 220,
    image_advtab:true,
    menubar:false,
    plugins:
      'advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools'
    ,
    toolbar:[
      'undo redo | bold italic | alignleft aligncenter alignjustify | bullist numlist outdent indent',
      'forecolor backcolor | fontselect fontsizeselect'
    ],
    image_advtab: true
  });

  $(".alert").alert();
  // FormatCurrency
  function FormatCurrency(objNum)
  {
     var num = objNum.value
     var ent, dec;
     if (num != '' && num != objNum.oldvalue)
     {
       num = HapusTitik(num);
       if (isNaN(num))
       {
         objNum.value = (objNum.oldvalue)?objNum.oldvalue:'';
       } else {
         var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
         if (ev.keyCode == 190 || !isNaN(num.split('.')[1]))
         {
           alert(num.split('.')[1]);
           objNum.value = TambahTitik(num.split('.')[0])+'.'+num.split('.')[1];
         }
         else
         {
           objNum.value = TambahTitik(num.split('.')[0]);
         }
         objNum.oldvalue = objNum.value;
       }
     }
  }
  function HapusTitik(num)
  {
     return (num.replace(/\./g, ''));
  }

  function TambahTitik(num)
  {
     numArr=new String(num).split('').reverse();
     for (i=3;i<numArr.length;i+=3)
     {
       numArr[i]+='.';
     }
     return numArr.reverse().join('');
  }

  function formatCurrency(num) {
     num = num.toString().replace(/\$|\./g,'');
     if(isNaN(num))
     num = "0";
     sign = (num == (num = Math.abs(num)));
     num = Math.floor(num*100+0.50000000001);
     cents = num0;
     num = Math.floor(num/100).toString();
     for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
     num = num.substring(0,num.length-(4*i+3))+'.'+
     num.substring(num.length-(4*i+3));
     return (((sign)?'':'-') + num);
  }
  //Slide Image
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("slide-iklan");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
  }

  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("gambar-gambar");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
  }
</script>
</body>
</html>
