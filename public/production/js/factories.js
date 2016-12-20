var factories = angular.module('app.factories', []);

factories.factory('AdminFactory', function ($http, api_production, api_center, $localStorage, $rootScope) {
    var data = {};
    var getToken = function () {
        var token = $localStorage.token;
        if (token != undefined) {
            var headers = {headers: {'api_access_token': token.api_access_token, 'production_access_token': token.production_access_token}};
        } else {
            var headers = ""
        }
        return headers;
    }

    data.checkProductionToken = function () {
        return $http.get(api_production + '?action=checktoken', getToken());
    }

    data.AdminLogin = function (datas) {
        return $http.post(api_production + '?action=login', datas);
    };

    data.GetDataMaterial = function (datas) {
        return $http.get(api_center + '/material/data', getToken());
    }

    data.GetDataDemand = function (datas) {
        return $http.get(api_center + '/demand/data', getToken());
    }

    data.PostNewDemand = function (datas, target) {
        return $http.post(api_center + '/demand/add', datas, getToken());
    };

    data.GetApiAccess = function (datas) {
        return $http.get(api_production + '?action=checkapiaccess', getToken());
//        return checkProductionToken();
    }

    data.ValidateApiAccess = function (datas) {
        return $http.post(api_production + '?action=validateapiaccess', datas, getToken());
//        return checkProductionToken();
    }
    
    data.ChangeApiAccess = function (datas) {
        return $http.post(api_production + '?action=changeapiaccess', datas, getToken());
//        return checkProductionToken();
    }

    return data;


})