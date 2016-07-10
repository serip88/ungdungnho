// lazyload config

angular.module('app')
    /**
   * jQuery plugin config use ui-jq directive , config the js and css files that required
   * key: function name of the jQuery plugin
   * value: array of the css js file located
   */
  .constant('JQ_CONFIG', {
      easyPieChart:   [baseUrl+'vendor/jquery/charts/easypiechart/jquery.easy-pie-chart.js'],
      sparkline:      [baseUrl+'vendor/jquery/charts/sparkline/jquery.sparkline.min.js'],
      plot:           [baseUrl+'vendor/jquery/charts/flot/jquery.flot.min.js', 
                          baseUrl+'vendor/jquery/charts/flot/jquery.flot.resize.js',
                          baseUrl+'vendor/jquery/charts/flot/jquery.flot.tooltip.min.js',
                          baseUrl+'vendor/jquery/charts/flot/jquery.flot.spline.js',
                          baseUrl+'vendor/jquery/charts/flot/jquery.flot.orderBars.js',
                          baseUrl+'vendor/jquery/charts/flot/jquery.flot.pie.min.js'],
      slimScroll:     [baseUrl+'vendor/jquery/slimscroll/jquery.slimscroll.min.js'],
      sortable:       [baseUrl+'vendor/jquery/sortable/jquery.sortable.js'],
      nestable:       [baseUrl+'vendor/jquery/nestable/jquery.nestable.js',
                          baseUrl+'vendor/jquery/nestable/nestable.css'],
      filestyle:      [baseUrl+'vendor/jquery/file/bootstrap-filestyle.min.js'],
      slider:         [baseUrl+'vendor/jquery/slider/bootstrap-slider.js',
                          baseUrl+'vendor/jquery/slider/slider.css'],
      chosen:         [baseUrl+'vendor/jquery/chosen/chosen.jquery.min.js',
                          baseUrl+'vendor/jquery/chosen/chosen.css'],
      TouchSpin:      [baseUrl+'vendor/jquery/spinner/jquery.bootstrap-touchspin.min.js',
                          baseUrl+'vendor/jquery/spinner/jquery.bootstrap-touchspin.css'],
      wysiwyg:        [baseUrl+'vendor/jquery/wysiwyg/bootstrap-wysiwyg.js',
                          baseUrl+'vendor/jquery/wysiwyg/jquery.hotkeys.js'],
      dataTable:      [baseUrl+'vendor/jquery/datatables/jquery.dataTables.min.js',
                          baseUrl+'vendor/jquery/datatables/dataTables.bootstrap.js',
                          baseUrl+'vendor/jquery/datatables/dataTables.bootstrap.css'],
      vectorMap:      [baseUrl+'vendor/jquery/jvectormap/jquery-jvectormap.min.js', 
                          baseUrl+'vendor/jquery/jvectormap/jquery-jvectormap-world-mill-en.js',
                          baseUrl+'vendor/jquery/jvectormap/jquery-jvectormap-us-aea-en.js',
                          baseUrl+'vendor/jquery/jvectormap/jquery-jvectormap.css'],
      footable:       [baseUrl+'vendor/jquery/footable/footable.all.min.js',
                          baseUrl+'vendor/jquery/footable/footable.core.css']
      }
  )
  // oclazyload config
  .config(['$ocLazyLoadProvider', function($ocLazyLoadProvider) {
      // We configure ocLazyLoad to use the lib script.js as the async loader
      $ocLazyLoadProvider.config({
          debug:  false,
          events: true,
          modules: [
              {
                  name: 'ngGrid',
                  files: [
                      'vendor/modules/ng-grid/ng-grid.min.js',
                      'vendor/modules/ng-grid/ng-grid.min.css',
                      'vendor/modules/ng-grid/theme.css'
                  ]
              },
              {
                  name: 'ui.select',
                  files: [
                      'vendor/modules/angular-ui-select/select.min.js',
                      'vendor/modules/angular-ui-select/select.min.css'
                  ]
              },
              {
                  name:'angularFileUpload',
                  files: [
                      baseUrl+'vendor/modules/angular-file-upload/2.3.4/angular-file-upload.min.js'
                  ]
              },
              {
                  name:'ngFileUpload',
                  files: [
                      baseUrl+'vendor/modules/ng-file-upload/12.0.4/common.css',
                      baseUrl+'vendor/modules/ng-file-upload/12.0.4/ng-file-upload-shim.js',
                      baseUrl+'vendor/modules/ng-file-upload/12.0.4/ng-file-upload.js'
                  ]
              },
              {
                  name:'ui.calendar',
                  files: [baseUrl+'vendor/modules/angular-ui-calendar/calendar.js']
              },
              {
                  name: 'ngImgCrop',
                  files: [
                      'vendor/modules/ngImgCrop/ng-img-crop.js',
                      'vendor/modules/ngImgCrop/ng-img-crop.css'
                  ]
              },
              {
                  name: 'angularBootstrapNavTree',
                  files: [
                      baseUrl+'vendor/modules/angular-bootstrap-nav-tree/abn_tree_directive.js',
                      baseUrl+'vendor/modules/angular-bootstrap-nav-tree/abn_tree.css'
                  ]
              },
              {
                  name: 'toaster',
                  files: [
                      'vendor/modules/angularjs-toaster/toaster.js',
                      'vendor/modules/angularjs-toaster/toaster.css'
                  ]
              },
              {
                  name: 'textAngular',
                  files: [
                      'vendor/modules/textAngular/textAngular-sanitize.min.js',
                      'vendor/modules/textAngular/textAngular.min.js'
                  ]
              },
              {
                  name: 'vr.directives.slider',
                  files: [
                      'vendor/modules/angular-slider/angular-slider.min.js',
                      'vendor/modules/angular-slider/angular-slider.css'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular',
                  files: [
                      'vendor/modules/videogular/videogular.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.controls',
                  files: [
                      'vendor/modules/videogular/plugins/controls.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.buffering',
                  files: [
                      'vendor/modules/videogular/plugins/buffering.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.overlayplay',
                  files: [
                      'vendor/modules/videogular/plugins/overlay-play.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.poster',
                  files: [
                      'vendor/modules/videogular/plugins/poster.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.imaads',
                  files: [
                      'vendor/modules/videogular/plugins/ima-ads.min.js'
                  ]
              }
          ]
      });
  }])
;