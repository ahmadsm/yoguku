//var navControllers = angular.module('app.navControllers', []);
var navControllers = angular.module('app.navControllers', [])

navControllers.controller('FrontNavController', function ($scope, $state) {
    $scope.title = 'Production';
    // returns true if the current router url matches the passed in url
    // so views can set 'active' on links easily
    $scope.isUrl = function (url) {
        if (url === '#')
            return false;
        return ('#' + $state.$current.url.source + '/').indexOf(url + '/') === 0;
    };

});


navControllers.controller('AdminNavController', function ($scope, $state) {
    $scope.title = 'Production - Administrator';
    $scope.isUrl = function (url) {
        if (url === '#')
            return false;
        return ('#' + $state.$current.url.source + '/dashboard').indexOf(url + '/dashboard') === 0;
    };

    $scope.pages = [
        {
            name: 'Material'
            , url: 'admin.material'
        },
        {
            name: 'Demand'
            , url: 'admin.demand'
        }, {
            name: 'Account'
            , url: '#'
            , subPages: [
                {
                    name: 'API Access'
                    , url: 'admin.api_access'
                },
                {
                    name: 'User Login'
                    , url: 'admin.user_data'
                }
                
            ]
        }, {
            name: 'Logout'
            , url: 'admin.logout'            
        },
    ]

});