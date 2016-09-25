// config
var baseUrl = 'http://ungdungnho.localhost/app/';
var adBaseUrl = 'http://ungdungnho.localhost/app/tpl/admin/';
var baseConfig = {};
    baseConfig.apiUrl = 'http://ungdungnho.localhost/api';
    baseConfig.adminBaseUrl = 'http://ungdungnho.localhost/app/tpl/admin/';
    baseConfig.baseUrl = 'http://ungdungnho.localhost/app/';
    baseConfig.host = 'http://ungdungnho.localhost/';
var app =  angular.module('app')
  .config(
    [        '$controllerProvider', '$compileProvider', '$filterProvider', '$provide',
    function ($controllerProvider,   $compileProvider,   $filterProvider,   $provide) {
        
        // lazy controller, directive and service
        app.controller = $controllerProvider.register;
        app.directive  = $compileProvider.directive;
        app.filter     = $filterProvider.register;
        app.factory    = $provide.factory;
        app.service    = $provide.service;
        app.constant   = $provide.constant;
        app.value      = $provide.value;
    }
  ]).config(function($popoverProvider) {
    angular.extend($popoverProvider.defaults, {
      html: true
    });
  })
  .config(['$translateProvider', function($translateProvider){
    // Register a loader for the static files
    // So, the module will search missing translation tables under the specified urls.
    // Those urls are [prefix][langKey][suffix].
    
    $translateProvider.useStaticFilesLoader({
      prefix: baseUrl+'l10n/',
      suffix: '.js'
    });
    // Tell the module what language to use by default
    $translateProvider.preferredLanguage('en');
    // Tell the module to store the language in the local storage
    $translateProvider.useLocalStorage();
  }]);