var factories = angular.module('app.factories', []);

factories.factory('LoginFactory', function ($http, api) {
    var data = {};
    data.getUserValidLogin = function (datas) {
        return $http.post(api + 'login', datas);
    };
    return data;
});

factories.factory('TokenFactory', function ($http, api, $rootScope) {
    var data = {};
    data.AdminCheckToken = function (datas) {
        return $http({
            method: 'POST',
            url: api + 'admin/checktoken',
            headers: {'data-token': datas},
        });
    };
    return data;
})



factories.factory('AdminFactory', function ($http, api, api_center, $localStorage, $rootScope) {
    var data = {};
//    var getToken = function () {
//        var text = $localStorage.akhlakq_token.token;
//        var encode = text.trim(text);
//        var headers = {headers: {'data-token': encode}};
//        return headers;
//    }

    data.AdminLogin = function (datas) {
        return $http.post(api + '?action=login', datas);
    };

    data.AddData = function (datas) {
        return $http.post(api + 'admin/content/judul/add', datas, getToken());
    };

    data.GetDataContent = function (datas) {
        return $http.get(api + 'admin/content', getToken());
    }

    data.GetDataMaterial = function (datas) {
        return $http.get(api_center + '/material/data');
    }

    data.PostNewDemand = function (datas, target) {
        return $http.post(api_center + '/demand/new_demand', datas);
    };
    data.GetDataContentSeq = function (datas) {
        return $http.get(api + 'admin/content/view/' + datas, getToken());
    }

    data.uploadFile = function (datas) {
        var text = $localStorage.akhlakq_token.token;
        var encode = text.trim(text);
        var headers =
                {
                    'transformRequest': angular.identity,
                    headers:
                            {
                                'Content-Type': undefined,
                                'data-token': encode,
                                'data-content-seq': $rootScope.content_seq
                            }
                };

        return $http.post(api + 'admin/file/upload', datas, headers);
    }

    data.EditData = function (datas) {
        return $http.put(api + 'admin/content/edit', datas, getToken());
    }
    return data;
})