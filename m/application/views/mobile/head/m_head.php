<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $this->session->flashdata('title_tag') ?>amanahstores.com - Semua ada disini</title>

  	<meta name="description" content="<?php echo $this->session->flashdata('desc'); ?>">
  	<meta name="robots" content="index, follow">
  	<meta name="author" content="amanahstores">
  	<meta property="og:type" content="website">
  	<meta property="og:title" content="<?php echo $this->session->flashdata('title_tag') ?>amanahstores.com - Semua ada disini">
  	<meta property="og:site_name" content="amanahstores.com">
  	<meta property="og:url" content="<?php echo $this->session->flashdata('url')?>">
  	<meta property="og:image" content="<?php echo $this->session->flashdata('image') ?>">
  	<meta property="article:published_time" content="<?php echo $this->session->flashdata('publish-time') ?>">
  	<meta property="article:author" content="amanahstores.com">

    <!-- <link rel="shortcut icon" type="image/x-image" href="<?php echo base_url("images/fav.ico") ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url("web/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("web/css/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("web/css/mobile.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("web/css/color.css") ?>">

    <link rel="shortcut icon" type="image/x-image" href="<?php echo base_url('images/favicon_amanahstores.ico') ?>">

    <script src="<?php echo base_url("web/bower_components/jquery/dist/jquery.min.js") ?>" charset="utf-8"></script>
    <script src="<?php echo base_url("web/js/bootstrap.min.js") ?>" charset="utf-8"></script>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php $this->load->view('analytics'); ?>
