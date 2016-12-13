var apps = angular.module('app', [
    'app.navControllers', 'app.controllers', 'app.factories', 'app.services', 'app.constants', 'app.directives',
    'ui.router', 'ngAnimate', 'toastr', 'ui.bootstrap', 'angular-md5', 'ngStorage', 'angular-jwt', 'ngFileUpload'])


apps.config(function ($stateProvider, $urlRouterProvider, $controllerProvider) {
    var origController = apps.controller
    apps.controller = function (name, constructor) {
        $controllerProvider.register(name, constructor);
        return origController.apply(this, arguments);
    }
    var viewsPrefix = 'views/';
    // For any unmatched url, send to /        
    $stateProvider
            .state('front', {
                url: '/front'
                , templateUrl: viewsPrefix + "front.html"
                , controller: 'FrontNavController'
            })

            .state('front.home', {
                url: '/home'
                , templateUrl: viewsPrefix + "home.html"
            })

            .state('front.about', {
                url: '/about'
                , templateUrl: viewsPrefix + "about.html"
            })

            .state('front.loginadmin', {
                url: '/login-admin'
                , templateUrl: viewsPrefix + "login-admin.html"
                , controller: 'AdminController'

            })

            .state('admin', {
                url: '/admin'
                , abstract: true
                , templateUrl: viewsPrefix + "/admin/nav-admin.html"
                , controller: 'AdminNavController'
            })

            .state('admin.dashboard', {
                url: '/dashboard'
                , templateUrl: viewsPrefix + "/admin/dashboard.html"
                , controller: 'AdminController'
                , })

            .state('admin.material', {
                url: '/material'
                , templateUrl: viewsPrefix + "/admin/material.html"
                , controller: 'AdminMaterialController'
                , })
            
            .state('admin.demand', {
                url: '/demand'
                , templateUrl: viewsPrefix + "/admin/demand.html"
                , controller: 'AdminDemandController'
                , })
            .state('admin.edit_data', {
                url: '/edit/:contentEditSeq'
                , templateUrl: viewsPrefix + "/admin/display-content.html"
                , controller: 'AdminController'
                , })



            .state('admin.view_data', {
                url: '/view/:contentViewSeq'
                , templateUrl: viewsPrefix + "/admin/display-content.html"
                , controller: 'AdminController'
                , })

    $urlRouterProvider.otherwise("/front/home")
})
        .directive('updateTitle', ['$rootScope', '$timeout', function ($rootScope, $timeout) {
                return {
                    link: function (scope, element) {
                        var listener = function (event, toState) {
                            var title = 'Production';
                            if (toState.data && toState.data.pageTitle)
                                title = toState.data.pageTitle + ' - ' + title;
                            $timeout(function () {
                                element.text(title);
                            }, 0, false);
                        };

                        $rootScope.$on('$stateChangeSuccess', listener);
                    }
                };
            }
        ]);