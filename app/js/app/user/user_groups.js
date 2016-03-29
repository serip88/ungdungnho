/**
 * Created by Rain on 23/02/2016.
 */
(function(window, angular, $, undefined){
    'use strict';

  
  app.controller('UserGroupCtrl', ['$scope', '$modal', '$log', 'openModal', 'userService', 'SweetAlert', function($scope, $modal, $log, openModal, userService, SweetAlert) {

    function userGroupList() {
        userService.httpGet(userApi.getUserGroup).then(function(responseData) {
            if (responseData.status) {
              $scope.userGroupList = responseData.rows;
              $scope.user = {selected:[],roles:[],is_check_all:false};
              angular.forEach( $scope.userGroupList, function(value, key) {
                $scope.userGroupList[key]['id'] = parseInt(value.id) ;
                //$scope.user.roles[value.user_id]= value.username ;
                $scope.user.roles.push({id:value.id,name:value.name});
              });
            }
        });
    }
    userGroupList();
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

    $scope.openAddGroupUser = function (size) {
      userService.httpGet(userApi.getPermissions).then(function(responseData) {
          if (responseData.status) {
            modalAddUser(size,responseData.rows);
          }
      });
      
    }; 
    function modalAddUser(size,list_permissions) {
      var modalObj = {
        templateUrl: adBaseUrl +'modal/user/add_group_user.html',
        size: size,
        controller: ['$scope', '$modalInstance', function(scope, $modalInstance){
          scope.newuser = {};
          scope.newuser.list_permissions = list_permissions;
          scope.usergroup = {access_selected:[],roles:[],access_check_all:false,modify_selected:[]};
            angular.forEach( scope.newuser.list_permissions, function(value, key) {
              scope.usergroup.roles.push(value);
            });
          scope.checkAllAc = function() {
            //$scope.usergroup.access_selected = $scope.usergroup.roles.map(function(item) { return item.id; });
            scope.usergroup.access_selected = angular.copy(scope.usergroup.roles);
          };
          scope.uncheckAllAc = function() {
            scope.usergroup.access_selected = [];
          };  
          scope.checkAllMo = function() {
            //$scope.usergroup.access_selected = $scope.usergroup.roles.map(function(item) { return item.id; });
            scope.usergroup.modify_selected = angular.copy(scope.usergroup.roles);
          };
          scope.uncheckAllMo = function() {
            scope.usergroup.modify_selected = [];
          };
          scope.cancel = function(){
            $modalInstance.close();
          };
          scope.ok = function(invalid){
            if(!validateAddUser() && invalid){
              return;
            }       
            scope.newuser.access_selected = scope.usergroup.access_selected;
            scope.newuser.modify_selected = scope.usergroup.modify_selected;
            userService.httpPost(userApi.userGroupSave,scope.newuser).then(function(responseData) {
                if (responseData.status) {
                 SweetAlert.swal("Add success!", "", "success");
                 userGroupList();
                 $modalInstance.close();
                }
            });
          };
          function validateAddUser() {
            if(typeof(scope.newuser.user_group_name == 'undefined') ){
              return 0;
            }else{
              return 1;
            } 
          };

        }]
      };
      openModal.custom(modalObj);
    }

    $scope.userGroupEdit = function (item) {
      userService.httpGet(userApi.groupDetail,item).then(function(responseData) {
          if (responseData.status) {
            modalEditUser('lg',responseData.data);
          }
      });
    }
    function modalEditUser(size,data) {
       var modalObj = {
        templateUrl: adBaseUrl +'modal/user/add_group_user.html',
        size: size,
        controller: ['$scope', '$modalInstance', function(scope, $modalInstance){
          scope.newuser = {};
          scope.usergroup = {access_selected:[],roles:[],access_check_all:false,modify_selected:[]};
          scope.newuser.id = data.id;
          scope.newuser.user_group_name = data.name;
          scope.usergroup.roles = scope.newuser.list_permissions = data.list_permissions;

            angular.forEach( data.permission.access, function(value, key) {
              scope.usergroup.access_selected.push(value);
            });
            angular.forEach( data.permission.modify, function(value, key) {
              scope.usergroup.modify_selected.push(value);
            });
          scope.checkAllAc = function() {
            //$scope.usergroup.access_selected = $scope.usergroup.roles.map(function(item) { return item.id; });
            scope.usergroup.access_selected = angular.copy(scope.usergroup.roles);
          };
          scope.uncheckAllAc = function() {
            scope.usergroup.access_selected = [];
          };  
          scope.checkAllMo = function() {
            //$scope.usergroup.access_selected = $scope.usergroup.roles.map(function(item) { return item.id; });
            scope.usergroup.modify_selected = angular.copy(scope.usergroup.roles);
          };
          scope.uncheckAllMo = function() {
            scope.usergroup.modify_selected = [];
          };
          scope.cancel = function(){
            $modalInstance.close();
          };
          scope.ok = function(invalid){
            if(!validateAddUser() && invalid){
              return;
            }       
            scope.newuser.access_selected = scope.usergroup.access_selected;
            scope.newuser.modify_selected = scope.usergroup.modify_selected;
            userService.httpPost(userApi.userGroupSave,scope.newuser).then(function(responseData) {
                if (responseData.status) {
                 SweetAlert.swal("Add success!", "", "success");
                 userGroupList();
                 $modalInstance.close();
                }
            });
          };
          function validateAddUser() {
            if(typeof(scope.newuser.user_group_name == 'undefined') ){
              return 0;
            }else{
              return 1;
            } 
          };

        }]
      };
      openModal.custom(modalObj);
    }

  }]);

  

})(window, window.angular, window.jQuery);