<!DOCTYPE html>
<html lang="en" data-ng-app="app">
<head>
  <meta charset="utf-8" />
  <title>Be Angular | Bootstrap Admin Web App with AngularJS</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo base_url();?>app/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>app/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>app/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>app/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>app/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>app/css/app.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>app/css/style.css" type="text/css" />
  <!--<link rel="stylesheet" href="http://www.guriddo.net/demo/css/trirand/ui.jqgrid.css" type="text/css" />-->
</head>
<body>
<div class="app" id="app" ng-class="{'app-header-fixed':app.settings.headerFixed, 'app-aside-fixed':app.settings.asideFixed, 'app-aside-folded':app.settings.asideFolded, 'app-aside-dock':app.settings.asideDock, 'container':app.settings.container}"  ui-view>
</div>

  <!-- jQuery -->
  <script src="<?php echo base_url();?>app/vendor/jquery/jquery.min.js"></script>

  <!-- Angular -->
  <!--<script src="<?php echo base_url();?>app/vendor/angular/angular.js"></script>-->
  <script src="<?php echo base_url();?>app/vendor/angular/angular-1.5.7.js"></script>
  
  <script src="<?php echo base_url();?>app/vendor/angular/angular-animate/angular-animate-1.5.7.js"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-cookies/angular-cookies-1.5.7.js"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-resource/angular-resource-1.5.7.js"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-sanitize/angular-sanitize-1.5.7.js"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-touch/angular-touch.js"></script>
  <!-- Vendor -->
  <script src="<?php echo base_url();?>app/vendor/angular/angular-ui-router/angular-ui-router.js"></script> 
  <script src="<?php echo base_url();?>app/vendor/angular/ngstorage/ngStorage.js"></script>
  
 

  <!-- bootstrap -->
  <!--<script src="<?php echo base_url();?>app/vendor/angular/angular-bootstrap/ui-bootstrap-tpls.js"></script>-->
  <script src="<?php echo base_url();?>app/vendor/angular/angular-bootstrap/ui-bootstrap-tpls-1.3.3.js"></script>
  <!-- angular-strap source: http://mgcrea.github.io/angular-strap/##popovers-->
  <link rel="stylesheet" href="<?php echo base_url();?>app/vendor/angular/angular-strap/libs.min.css">
  <script src="<?php echo base_url();?>app/vendor/angular/angular-strap/angular-strap.js" data-semver="v2.3.8"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-strap/angular-strap.tpl.js" data-semver="v2.3.8"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-strap/angular-strap.docs.tpl.js" data-semver="v2.3.8"></script>
  <!--<link rel="stylesheet" href="//mgcrea.github.io/angular-strap/styles/libs.min.css">
  <script src="//mgcrea.github.io/angular-strap/dist/angular-strap.js" data-semver="v2.3.8"></script>
  <script src="//mgcrea.github.io/angular-strap/dist/angular-strap.tpl.js" data-semver="v2.3.8"></script>
  <script src="//mgcrea.github.io/angular-strap/docs/angular-strap.docs.tpl.js" data-semver="v2.3.8"></script>-->
  <!-- lazyload -->
  <script src="<?php echo base_url();?>app/vendor/angular/oclazyload/ocLazyLoad.js"></script>
  <!-- translate -->
  <script src="<?php echo base_url();?>app/vendor/angular/angular-translate/angular-translate.js"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-translate/loader-static-files.js"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-translate/storage-cookie.js"></script>
  <script src="<?php echo base_url();?>app/vendor/angular/angular-translate/storage-local.js"></script>
  <!-- lib -->
  <!--<link rel="stylesheet" href="<?php echo base_url();?>app/js/lib/Validation-Engine/css/validationEngine.jquery.css" type="text/css">
  <script src="<?php echo base_url();?>app/js/lib/Validation-Engine/js/languages/jquery.validationEngine-vi.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo base_url();?>app/js/lib/Validation-Engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>-->
  <link rel="stylesheet" href="<?php echo base_url();?>app/js/lib/sweetalert/dist/sweetalert.css">
  <!-- App -->
  <script src="<?php echo base_url();?>app/js/app.js"></script>
  <script src="<?php echo base_url();?>app/js/config.js"></script>
  <script src="<?php echo base_url();?>app/js/config.lazyload.js"></script>
  <script src="<?php echo base_url();?>app/js/config.router.js"></script>
  <script src="<?php echo base_url();?>app/js/main.js"></script>
  <script src="<?php echo base_url();?>app/js/services/ui-load.js"></script>
  <script src="<?php echo base_url();?>app/js/services/common-service.js"></script>
  <script src="<?php echo base_url();?>app/js/services/open-modal.js"></script>
  <script src="<?php echo base_url();?>app/js/filters/fromNow.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/setnganimate.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-butterbar.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-focus.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-fullscreen.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-jq.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-module.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-nav.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-scroll.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-shift.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-toggleclass.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/ui-validate.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/sweet-alert.min.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/SweetAlert.min.js"></script>
  <script src="<?php echo base_url();?>app/js/directives/checklist-model.js"></script>
  <script src="<?php echo base_url();?>app/js/controllers/bootstrap.js"></script>
  <!-- Lazy loading -->  
</body>
</html>