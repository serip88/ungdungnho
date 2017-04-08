/**
 * Created by Rain on 23/02/2016.
 */
var postApi = {
    baseUrl: baseConfig.apiUrl,
    adminGroup: 'user/admin_group'
  };

(function(window, angular, $, undefined){
    'use strict';

  app.factory("postService", ["$http", "$q", function ($http, $q) {
    var postObject = {};
    
    return postObject;
  }]);

  app.controller('PostCtrl', ['$scope', '$uibModal', '$log', 'openModal', 'postService', 'SweetAlert', function($scope, $uibModal, $log, openModal, postService, SweetAlert) {
    alert(1);
        

  }]);

  app.controller('PostValidCtrl', ['$scope', '$uibModal', 'postService', function($scope, $uibModal, postService) {
   
    
  
  }]);
  app.controller('PostReportCtrl', ['$scope', '$uibModal', 'postService', function($scope, $uibModal, postService) {
   
    
  
  }]);


})(window, window.angular, window.jQuery);