/**
 * Created by Rain on 23/02/2016.
 */
 var productApi = {
    baseUrl: baseConfig.apiUrl,
    productSave: 'product/save',
    productList: 'product/product_list',
    categoryList: 'category/category_list',
};
(function(window, angular, $, undefined){
	'use strict';

    app.factory("productService", ["$http", "$q", function ($http, $q) {
	    var productObject = {};
	    
	    productObject.httpGet = function (path, params, block) {
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
	    productObject.httpPost = function (path, params, block) {
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
	    return productObject;
	}]);

	app.controller('ProductCtrl', ['$scope', '$modal', '$log', 'openModal', 'SweetAlert', 'productService', function($scope, $modal, $log, openModal, SweetAlert, productService) {
		$scope.checkAll = function() {
	    	$scope.products.selected = $scope.products.roles.map(function(item) { return item.id; });
	    };
	    $scope.uncheckAll = function() {
	      	$scope.products.selected = [];
	    };
	    $scope.isCheckAll = function() {
	      	$scope.products.is_check_all = !$scope.products.is_check_all;
	      	if($scope.products.is_check_all){
	        	$scope.checkAll();
	      	}else{
	        	$scope.uncheckAll();
	      	}
	    }; 
		function productList() {
	        productService.httpGet(productApi.productList).then(function(responseData) {
	            if (responseData.status) {
	              $scope.productList = responseData.rows;
	              $scope.products = {selected:[],roles:[],is_check_all:false};
	              angular.forEach( $scope.productList, function(value, key) {
	                $scope.productList[key]['product_id'] = parseInt(value.product_id) ;
	                //$scope.user.roles[value.user_id]= value.username ;
	                $scope.products.roles.push({id:value.product_id,name:value.title_vn});
	              });
	            }
	        });
	    }
	    productList();
		$scope.openAddProduct = function (size) {
			productService.httpGet(productApi.categoryList).then(function(responseData) {
	            if (responseData.status) {
	      			modalAddProduct(size,responseData.rows);
	      		}
	        });
	      
	    };
	    function modalAddProduct(size,category_list) {
	        var modalObj = {
		        templateUrl: adBaseUrl +'modal/product/add_product.html',
		        size: size,
		        controller: ['$scope', '$modalInstance', 'dataInit', function(scope, $modalInstance, dataInit){
		          	scope.product = {};
		          	scope.categoryList = dataInit;
		          	scope.categoryList.push({id:0,path_parent_name_vn:'[Không danh mục]',path_parent_name_en:'[No Category]'});
		           	scope.cancel = function(){
		            	$modalInstance.close();
		           	};
		          	scope.ok = function(invalid){
			            if(!validateAddProduct() || invalid){
			              return;
			            }
			            scope.product.parent_id = scope.product.parent_selected?scope.product.parent_selected.id:0;
			            productService.httpPost(productApi.productSave,scope.product).then(function(responseData) {
			                if(responseData.status) {
			                 	SweetAlert.swal("Add product success!", "", "success");
			                 	$modalInstance.close();
			                 	productList();
			                }
			            });
		          	};
		          	function validateAddProduct() {
			            if(typeof(scope.product.name_vn) == 'undefined' || typeof(scope.product.name_en) == 'undefined' ){
			              return 0;
			            }else{
			              return 1;
			            } 
		          	};
		        }]
	      	};
	      	modalObj.resolve = {
		        dataInit: function(){
		            return category_list;
		        }
		    };
	      	openModal.custom(modalObj);
	    }

	}]);		
})(window, window.angular, window.jQuery);