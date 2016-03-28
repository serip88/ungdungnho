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
          $scope.usergroup = {access_selected:[],roles:[],access_check_all:false};
            angular.forEach( scope.newuser.list_permissions, function(value, key) {
              $scope.user.roles.push({id:key,name:value});
            });
          $scope.checkAllAc = function() {
            $scope.usergroup.access_selected = $scope.usergroup.roles.map(function(item) { return item.id; });
          };
          $scope.uncheckAllAc = function() {
            $scope.usergroup.access_selected = [];
          };  
          scope.cancel = function(){
            $modalInstance.close();
          };
          scope.ok = function(invalid){
            if(!validateAddUser() && invalid){
              return;
            }       

            userService.httpPost(userApi.userSave,scope.newuser).then(function(responseData) {
                if (responseData.status) {
                 SweetAlert.swal("Add success!", "", "success");
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

  }]);

  

})(window, window.angular, window.jQuery);