(function() {
  'use strict';

  angular
    .module('notGoJek')
    .controller('HomeCtrl', HomeCtrl);

  HomeCtrl.$inject = ['$http'];

  function HomeCtrl($http)
  {
  	var vm = this;
  	vm.today = "Cool!";

  	var base_api = '/api/';

  	$http.get(base_api + 'mobil', {type: 'json'}).then(function(response) {
  		console.log(response.data);
  	});
  }

})();