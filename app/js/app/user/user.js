/**
 * Created by Rain on 23/02/2016.
 */
var userApi = {
    baseUrl: baseConfig.apiUrl,
    userGroup: 'user/user_group',
    userList: 'user/user_list',
    userDetail: 'user/user_detail',
    userSave: 'user/user_save',
    userEdit: 'user/user_edit',
    userDelete: 'user/user_delete',
    groupPermissions: 'user_group/permissions',
    groupSave: 'user_group/save',
    groupDetail: 'user_group/detail',
    groupEdit: 'user_group/edit',
    groupDelete: 'user_group/delete'
  };
(function(window, angular, $, undefined){
    'use strict';

  app.factory("userService", ["$http", "$q", function ($http, $q) {
    var userObject = {};
    userObject.httpGet = function (path, params, block) {
        if(typeof block == 'undefined'){
            block = true;
        }
        var deferred = $q.defer();
        $http.get([baseConfig.apiUrl, path].join('/'), {block: block, params: params})
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
        $http.post([baseConfig.apiUrl, path].join('/'), params, block)
            .success(function (data) {
                deferred.resolve(data);
            }).error(function (data) {
                deferred.resolve(data);
            });
        return deferred.promise;
    }
    return userObject;
  }]);
  app.controller('UserCtrl', ['$scope', '$uibModal', '$log', 'openModal', 'userService', 'SweetAlert', function($scope, $uibModal, $log, openModal, userService, SweetAlert) {
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
      var modalInstance = $uibModal.open({
        templateUrl: 'addUser.html',
        controller: ['$scope', '$uibModalInstance', function ($scope, $uibModalInstance) {
          $scope.newuser= {};
          $scope.ok = function () {
            $uibModalInstance.close($scope.newuser);
          };
          $scope.cancel = function () {
            $uibModalInstance.dismiss('cancel');
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
      controller: ['$scope', '$uibModalInstance', function(scope, $uibModalInstance){
        scope.newuser = {};
        scope.newuser.group_user = group_user;
        scope.cancel = function(){
          $uibModalInstance.close();
        };
        scope.ok = function(invalid){
          if(!validateAddUser() || invalid){
            return;
          }       

          userService.httpPost(userApi.userSave,scope.newuser).then(function(responseData) {
              if (responseData.status) {
               SweetAlert.swal("Add success!", "", "success");
               userList();
               $uibModalInstance.close();
              }else{
                SweetAlert.swal({
                  title: responseData.msg,
                  text: "",
                  type: "warning",
                  confirmButtonText: "Ok"
                });
              }
          });
        };
        function validateAddUser() {
          if(typeof(scope.newuser.user_group_id)=='undefined' || typeof(scope.newuser.username) == 'undefined' ){
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
  function deleteUserAction(){
    userService.httpPost(userApi.userDelete,{'user_delete':$scope.user.selected} ).then(function(responseData) {
        if (responseData.status) {
         SweetAlert.swal("Delete success!", "", "success");
         userList();
        }else{
          SweetAlert.swal({
            title: "Have problem when delete user!",
            text: "",
            type: "warning",
            confirmButtonText: "Ok"
          });
        }
    });
  }

  $scope.deleteUser = function () {
    var modalObj = {
        title: 'Delete User',
        body: 'Do you want delete selected user(s) ?',
        ok: {
            txt: 'Yes',
            fn: function () {
              if($scope.user.selected.length){
                userService.httpPost(userApi.userDelete,{'user_delete':$scope.user.selected} ).then(function(responseData) {
                    if (responseData.status) {
                     SweetAlert.swal("Delete success!", "", "success");
                     userList();
                    }else{

                    }
                });
              }else{
                openModal.alert('Chú ý', 'Vui lòng chọn user');
              }
            }
        }
    };
    if($scope.user.selected.length){
      //openModal.confirm(modalObj); 
      SweetAlert.swal({
         title: "Are you sure?",
         text: "Your will not be able to recover this users!",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "Yes, delete it!",
         closeOnConfirm: false}, 
      function(isConfirm){ 
          if(isConfirm){
            deleteUserAction();
          }
      });
    }else{
      SweetAlert.swal({
         title: "Please select users!",
         text: "",
         type: "warning",
         confirmButtonText: "Ok"
       });
    }
  }
  
  $scope.openAddUser = function (size) {
    userService.httpGet(userApi.userGroup).then(function(responseData) {
        if (responseData.status) {
          modalAddUser(size,responseData.rows);
        }
    });
    
  };
  $scope.userView = function (user_id) {
     userService.httpGet(userApi.userDetail,{user_id:user_id}).then(function(responseData) {
        if (responseData.status) {
          modalEditUser('lg',responseData.user_group,responseData.user);
        }
    });
  }
  $scope.userEdit = function (item) {
     userService.httpGet(userApi.userGroup).then(function(responseData) {
        if (responseData.status) {
          modalEditUser('lg',responseData.rows,item);
        }
    });
  }
  function modalEditUser(size,group_user,item) {
    var modalObj = {
      templateUrl: adBaseUrl +'modal/edit_user.html',
      size: size,
      controller: ['$scope', '$uibModalInstance','dataInit', function(scope, $uibModalInstance, dataInit){
        scope.newuser = item;
        scope.newuser.group_user = dataInit;
        scope.newuser.user_group_selected = {id:item.user_group_id};
        scope.cancel = function(){
          $uibModalInstance.close();
        };
        scope.ok = function(){
          scope.newuser.user_group_id = scope.newuser.user_group_selected?scope.newuser.user_group_selected.id:0;
          userService.httpPost(userApi.userEdit,scope.newuser).then(function(responseData) {
              if (responseData.status) {
               SweetAlert.swal("Edit user success!", "", "success");
               userList();
               $uibModalInstance.close();
              }else{
                SweetAlert.swal({
                  title: "Edit user False!",
                  text: "",
                  type: "warning",
                  confirmButtonText: "Close"
                });
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
      userService.httpGet(userApi.userList).then(function(responseData) {
        if (responseData.status) {
            $scope.userList = responseData.rows;
            $scope.user = {selected:[],roles:[],is_check_all:false};
            angular.forEach( $scope.userList, function(value, key) {
              $scope.userList[key]['user_id'] = parseInt(value.user_id) ;
              //$scope.user.roles[value.user_id]= value.username ;
              $scope.user.roles.push({id:value.user_id,name:value.username});
            });
        }
      });
  }
  userList();

  $scope.checkAll = function() {
    $scope.user.selected = $scope.user.roles.map(function(item) { return item.id; });
  };
  $scope.uncheckAll = function() {
    $scope.user.selected = [];
  };
  $scope.isCheckAll = function() {
    $scope.user.is_check_all = !$scope.user.is_check_all;
    if($scope.user.is_check_all){
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

  app.controller('UserListCtrl', ['$scope', '$uibModal', 'userService', function($scope, $uibModal, userService) {
    /*$scope.newuser = ['newuser1', 'newuser2', 'newuser3'];
    function userList() {
        $scope.userList = {};
      userService.httpGet(userApi.userList).then(function(responseData) {
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