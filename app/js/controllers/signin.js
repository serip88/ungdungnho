'use strict';

var loginApi = {
    baseUrl: baseConfig.apiUrl,
    userLogin: 'login/login',
    userLogout: 'user/logout',
  };

app.factory("loginService", ["$http", "$q", function ($http, $q) {
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
/* Controllers */
  // signin controller
app.controller('SigninFormController', ['$scope', '$http', '$state', 'loginService', function($scope, $http, $state, loginService) {
    $scope.user = {};
    $scope.authError = null;
    $scope.login = function() {
      $scope.authError = null;
      // Try to login
      loginService.httpPost(loginApi.userLogin, {email: $scope.user.email, password: $scope.user.password})
      .then(function(response) {
        if ( !response.status ) {
          $scope.authError = response.msg ? response.msg : 'Email or Password not is wrong!';
        }else{
          $state.go('app.dashboard');
        }
      }/*, function(x) {
        $scope.authError = 'Server Error';
      }*/);
    };
  }])
;