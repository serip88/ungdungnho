/**
 * Created by Rain on 23/02/2016.
 */
(function(window, angular, $, undefined){
    'use strict';

  var userApi = {
    baseUrl: baseConfig.apiUrl,
    getUserGroup: 'user/user_group',
    getUserList: 'user/user_list',
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
  function modalAddUser(size,group_user) {
    var modalObj = {
      templateUrl: adBaseUrl +'modal/add_user.html',
      size: size,
      controller: ['$scope', '$modalInstance', function(scope, $modalInstance){
        scope.newuser = {};
        scope.newuser.group_user = group_user;
        scope.cancel = function(){
          $modalInstance.close();
        };
        scope.ok = function(invalid){
          console.log(scope.newuser);
          if(!validateAddUser() && invalid){
            return;
          }       
          userService.httpPost('api/' + userApi.userSave,scope.newuser).then(function(responseData) {
              if (responseData.status) {
               openModal.alert('Add user','Add user thành công'); 
               userList();
               $modalInstance.close();
              }
          });
        };
        function validateAddUser() {
          if(typeof(scope.newuser.user_group_id)=='undefined' || typeof(scope.newuser.username == 'undefined') ){
            return 0;
          }else{
            return 1;
          } 
        };
        scope.formAllGood = function () {
            return (scope.usernameGood && scope.passwordGood && scope.passwordCGood && scope.selectGood && scope.nameGood)
        }
      }]
    };
    openModal.custom(modalObj);
  }
  $scope.deleteUser = function () {
    var modalObj = {
        title: 'Delete User',
        body: 'Do you want delete selected user(s) ?',
        ok: {
            txt: 'Yes',
            fn: function () {
               alert('ok');

            }
        }
    };
    openModal.confirm(modalObj);
  }
  
  $scope.openAddUser = function (size) {
    userService.httpGet('api/' + userApi.getUserGroup).then(function(responseData) {
        if (responseData.status) {
          modalAddUser(size,responseData.rows);
        }
    });
    
  };
  $scope.userView = function (user_id) {
     userService.httpGet('api/' + userApi.userDetail,{user_id:user_id}).then(function(responseData) {
        if (responseData.status) {
          modalEditUser('lg',responseData.user_group,responseData.user);
        }
    });
  }
  $scope.userEdit = function (item) {
     userService.httpGet('api/' + userApi.getUserGroup).then(function(responseData) {
        if (responseData.status) {
          modalEditUser('lg',responseData.rows,item);
        }
    });
  }
  function modalEditUser(size,group_user,item) {
    var modalObj = {
      templateUrl: adBaseUrl +'modal/edit_user.html',
      size: size,
      controller: ['$scope', '$modalInstance','dataInit', function(scope, $modalInstance, dataInit){
        scope.newuser = item;
        scope.newuser.group_user = dataInit;
        scope.newuser.user_group_id = {id:item.user_group_id};
        scope.cancel = function(){
          $modalInstance.close();
        };
        scope.ok = function(){
          console.log(scope.newuser);
          scope.newuser.user_group_id = scope.newuser.user_group_id.id;
          userService.httpPost('api/' + userApi.userEdit,scope.newuser).then(function(responseData) {
              if (responseData.status) {
               openModal.alert('Edit user','edit user thành công'); 
               userList();
               $modalInstance.close();
              }else{
                openModal.alert('Warning','edit user False'); 
              }
          });
        };
        }]
    };
    modalObj.resolve = {
        dataInit: function(){
            return group_user;
        }
    };
    openModal.custom(modalObj);
  }
  function userList() {
      $scope.userList = {};
      userService.httpGet('api/' + userApi.getUserList).then(function(responseData) {
        if (responseData.status) {
            $scope.userList = responseData.rows;
            $scope.userSelected = [];
            $scope.userRoles = [];
            angular.forEach( $scope.userList, function(value, key) {
              $scope.userList[key]['user_id'] = parseInt(value.user_id) ;
              //$scope.userRoles[value.user_id]= value.username ;
              $scope.userRoles.push({id:value.user_id,name:value.username});
            });
            $scope.is_check_all = false;
        }
      });
  }
  userList();

  $scope.checkAll = function() {
    $scope.userSelected = $scope.userRoles.map(function(item) { return item.id; });
  };
  $scope.uncheckAll = function() {
    $scope.userSelected = [];
  };
  $scope.isCheckAll = function() {
    $scope.is_check_all = !$scope.is_check_all;
    if($scope.is_check_all){
      $scope.checkAll();
    }else{
      $scope.uncheckAll();
    }
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

  app.controller('UserListCtrl', ['$scope', '$modal', 'userService', function($scope, $modal, userService) {
    /*$scope.newuser = ['newuser1', 'newuser2', 'newuser3'];
    function userList() {
        $scope.userList = {};
      userService.httpGet('api/' + userApi.getUserList).then(function(responseData) {
        if (responseData.status) {
            $scope.userList = responseData.rows;
        }
      });
    }
    userList();
    */
   
  
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