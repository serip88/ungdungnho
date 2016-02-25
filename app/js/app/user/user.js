/**
 * Created by Rain on 23/02/2016.
 */
(function(window, angular, $, undefined){
    'use strict';

  var userApi = {
    baseUrl: baseConfig.apiUrl,
    groupUsers: 'user/group_user',
    userDetail: 'user/user_detail',
    userSave: 'user/user_save',
    userEdit: 'user/user_edit',
    userDelete: 'user/user_delete',
  };

  app.factory("userService", ["$http", "$q", function ($http, $q) {
    var userObject = {};

    userObject.httpGet = function (path, params, block) {
        if(typeof block == 'undefined'){
            block = true;
        }
        var deferred = $q.defer();
        $http.get([userApi.apiUrl, path].join('/'), {block: block, params: params})
            .success(function (data) {
                deferred.resolve(data);
            }).error(function (data) {
                deferred.resolve(data);
            });
        return deferred.promise;
    }

    userObject.httpPost = function (path, params, block) {
        var deferred = $q.defer();
        if(typeof block == 'undefined'){
            block = httpBlockConfig;
        }
        $http.post([userApi.apiUrl, path].join('/'), params, block)
            .success(function (data) {
                deferred.resolve(data);
            }).error(function (data) {
                deferred.resolve(data);
            });
        return deferred.promise;
    }
    return userObject;
  }]);
  app.controller('UserCtrl', ['$scope', '$modal', '$log', 'openModal', 'userService', function($scope, $modal, $log, openModal, userService) {
    $scope.folds = [
      {name: 'Inbox', filter:''},
      {name: 'Starred', filter:'starred'},
      {name: 'Sent', filter:'sent'},
      {name: 'Important', filter:'important'},
      {name: 'Draft', filter:'draft'},
      {name: 'Trash', filter:'trash'}
    ];

    $scope.labels = [
      {name: 'Angular', filter:'angular', color:'#23b7e5'},
      {name: 'Bootstrap', filter:'bootstrap', color:'#7266ba'},
      {name: 'Client', filter:'client', color:'#fad733'},
      {name: 'Work', filter:'work', color:'#27c24c'}
    ];
    
    $scope.items = ['item1', 'item2', 'item3'];


    /*$scope.open = function (size) {
      var modalInstance = $modal.open({
        templateUrl: 'addUser.html',
        controller: ['$scope', '$modalInstance', function ($scope, $modalInstance) {
          $scope.newuser= {};
          $scope.ok = function () {
            $modalInstance.close($scope.newuser);
          };
          $scope.cancel = function () {
            $modalInstance.dismiss('cancel');
          };
        }],
        size: size,
        resolve: {
          items: function () {
            return scope.items;
          }
        }
      });

      modalInstance.result.then(function (selectedItem) {
        $scope.selected = selectedItem;
        $log.info($scope.selected);
      }, function () {
        $log.info('Modal dismissed at: ' + new Date());
      });
    };*/

  $scope.openAddUser = function (size) {
    var modalObj = {
      templateUrl: [adBaseUrl, 'modal/add_user.html'].join('/'),
      size: size,
      controller: ['$scope', '$modalInstance', function(scope, $modalInstance){
            userService.httpPost('api/' + userApi.groupUsers).then(function(responseData) {
                if (responseData.success) {
                    $scope.fileInfo = responseData.rows;
                }
            });
            scope.cancel = function(){
              $modalInstance.close();
            };
            scope.ok = function(){
              console.log(scope.newuser);
              if(1){
                openModal.confirm({
                    title: 'title',
                    body: 'Do you want to move it?',
                    ok:{
                      txt: 'Ok',
                      fn: function () {
                         
                      }
                    }
                });
              }
              else{
                openModal.alert('Error');
              }
            };
        }]
    };
    openModal.custom(modalObj);
  };


  /*$scope.open = function (size) {
    var modalObj = {
        title: 'title',
        body: 'body',
        ok: {
            txt: 'Ok',
            fn: function () {
                alert(1);
            }
        }
    };
    openModal.confirm(modalObj);
  };  */         

  }]);

  app.controller('UserListCtrl', ['$scope', '$modal', function($scope, $modal) {
    $scope.newuser = ['newuser1', 'newuser2', 'newuser3'];
    $scope.ok = function () {
      alert('Ok');
    };
  }]);

  app.controller('UserDetailCtrl', ['$scope', '$stateParams', function($scope, $stateParams) {
    alert(2);
  }]);

  app.controller('UserNewCtrl', ['$scope', function($scope) {
    $scope.mail = {
      to: '',
      subject: '',
      content: ''
    }
    $scope.tolist = [
      {name: 'James', email:'james@gmail.com'},
      {name: 'Luoris Kiso', email:'luoris.kiso@hotmail.com'},
      {name: 'Lucy Yokes', email:'lucy.yokes@gmail.com'}
    ];
    $scope.save = function (formdata) {

    };

  }]);

})(window, window.angular, window.jQuery);