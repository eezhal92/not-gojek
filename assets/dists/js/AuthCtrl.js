(function() {
  angular
    .module('notGoJek')
    .controller('AuthCtrl', AuthCtrl);

  AuthCtrl.$inject = ['$rootScope', '$location', 'AuthenticationService'];
  function AuthCtrl($rootScope, $location, AuthenticationService)
  {
  	var vm = this;

  	vm.login = login;

  	(function initController() {
  	  AuthenticationService.clearCredentials();
  	})();

  	function login() {
  	  vm.dataLoading = true;
  	  AuthenticationService.login(vm.username, vm.password, handleLogin);

  	  function handleLogin(response)
  	  {
  	  	if(response.success) {
  	  	  AuthenticationService.setCredentials(vm.username, vm.password);
  	  	  $location.path('/about');
  	  	} else {
		  vm.error = response.message;
		  vm.dataLoading = false;  	  		
  	  	}
  	  }

  	};
  }

})();