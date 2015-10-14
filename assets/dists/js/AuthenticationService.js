(function() {
  
  angular
    .module('notGoJek')
    .factory('AuthenticationService', AuthenticationService);

  AuthenticationService.$inject = ['$http', '$cookieStore', '$rootScope', 'Base64Service'];

  function AuthenticationService($http, $cookieStore, $rootScope, Base64Service)
  {
  	var AuthenticationService = {};

  	AuthenticationService.login = login;
  	AuthenticationService.setCredentials = setCredentials;
  	AuthenticationService.clearCredentials = clearCredentials;

  	return AuthenticationService;

  	function login(username, password, callback) {
  	  $http.post('api/login', {username: username, password: password})
  	  	.success(function(response){
  	  		callback(response);
  	  	});
  	}

  	function setCredentials(username, password)
  	{
  	  var authdata = Base64Service.encode(username + ':' + password);

  	  $rootScope.globals = {
  	  	currentUser: {
  	  		username: username,
  	  		authdata: authdata
  	  	}
  	  };

  	  $http.defaults.headers.common['Authorization'] = 'Basic ' + authdata;
  	  // $cookies.put('globals', $rootScope.globals);
  	}

  	function clearCredentials()
  	{
  	  $rootScope.globals = {};
  	  // $cookies.remove('globals');
  	  $http.defaults.headers.common['Authorization'] = 'Basic';  	  
  	}
  }

})();