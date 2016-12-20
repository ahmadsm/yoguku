var services = angular.module('app.services', []);

services.service('AdminTokenService', function ($localStorage, $state, AdminFactory, toastr) {
    this.checkToken = function () {
        var token = JSON.stringify($localStorage.token);
//        console.log(token);
        if (token == undefined)
        {
            console.log("No token");
            $state.go('front.loginadmin');
            toastr.warning("Not permitted");
        } else {
            AdminFactory.checkProductionToken().success(function (response)
            {                
                if (response.response != "OK") {
                    toastr.warning("Not permitted");
                    $state.go('front.loginadmin');
                }
            }).error(function (response) {
                console.log('no response');
            });
        }

    };
});

//services.service('fileUpload', function (AdminFactory) {
//
//    this.uploadFileToUrl = function (file) {
//        var fd = new FormData();
//        fd.append('file', file);        
//       
//        return AdminFactory.uploadFile(fd);
//    }
//});