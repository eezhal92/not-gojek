(function() {
  angular
    .module('notGoJek', ['ui.router', 'ngCookies'])
    .config(config);

  config.$inject = ['$stateProvider', '$urlRouterProvider', '$httpProvider'];

  function config($stateProvider, $urlRouterProvider, $httpProvider) {
    $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    var basePartials = './../assets/dists/partials/';
    
    $urlRouterProvider
      .otherwise('/home'); 

    $stateProvider
      .state('home', {
      	url: '/home',
      	templateUrl: basePartials + 'home.html',
      	controller: function($scope) {
      	  $scope.people = ['Bark', 'Shout', 'Scream'];
      	}
      })
      .state('about', {
        url: '/about',
        templateUrl: basePartials + 'about.html',
        controller: function($scope) {
          $scope.people = ['Bark', 'Shout', 'Scream'];
        }
      })
      .state('login', {
        url: '/account/login',
        templateUrl: basePartials + 'login.html',
        controller: 'AuthCtrl as auth'
      });
  }

})();