var services = angular.module('app.services', []);

services.service('AdminTokenService', function ($localStorage, $state, TokenFactory, toastr) {
    this.checkToken = function () {
        token = JSON.stringify($localStorage.akhlakq_token);
        if (token == null) {
            console.log("No token");
            $state.go('front.loginadmin');
            toastr.warning("Tidak diizinkan");
        } else {
            var text = $localStorage.akhlakq_token.token;
            var encode = text.trim(text);
            TokenFactory.AdminCheckToken(encode).success(function (response) {
//                console.log(JSON.stringify(response));
                if (response.response != "OK") {
                    console.log(response.message);
                    $state.go('front.loginadmin');
                }
            }).error(function (response) {
                console.log('no response');
            });
        }

    };
});

services.service('fileUpload', function (AdminFactory) {

    this.uploadFileToUrl = function (file) {
        var fd = new FormData();
        fd.append('file', file);        
       
        return AdminFactory.uploadFile(fd);
    }
});