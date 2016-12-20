var controllers = angular.module('app.controllers', [])

controllers.controller('AdminController', function (
        $scope, $localStorage, $state, $stateParams, $modal, $rootScope, md5,
        jwtHelper, AdminFactory, AdminTokenService, toastr, Upload)
{
    $scope.LoginAdmin = function () {
        input = {
            username: $scope.logindata.username
            , password: md5.createHash($scope.logindata.password)
        };
        AdminFactory.AdminLogin(input).success(function (response) {
            if (response.response == "OK") {
                $localStorage.token = {"api_access_token": response.data.api_access_token, "production_access_token": response.data.production_access_token};
                toastr.success(response.message);
                $state.go('admin.dashboard');
            } else {
                toastr.warning(response.message);
            }
        });
    };

    if ($state.current.name == 'admin.logout') {
        AdminTokenService.checkToken();
        if (confirm("Are you sure to logout ?"))
        {
            delete $localStorage.token;
            toastr.success("You're logout");
            $state.go('front.loginadmin');
        } else {
            $state.go('admin.dashboard');
        }
    }
    if ($state.current.name == 'admin.dashboard') {
        AdminTokenService.checkToken();
    }


});

controllers.controller('AdminMaterialController', function (
        $scope, $localStorage, $state, $stateParams, $modal, $rootScope, md5,
        jwtHelper, AdminFactory, AdminTokenService, toastr, Upload) {
    AdminTokenService.checkToken();
    var refreshData = function () {
        AdminFactory.GetDataMaterial().success(function (response) {
            if (response != "") {
                $scope.content = response;
            }
        })
    }
    refreshData();
})

controllers.controller('AdminDemandController', function (
        $scope, $filter, $localStorage, $state, $stateParams, $modal, $rootScope, md5,
        jwtHelper, AdminFactory, AdminTokenService, toastr, Upload) {
    AdminTokenService.checkToken();
    function getdatamaterial() {
        AdminFactory.GetDataMaterial().success(function (response) {
            if (response != "") {
                $scope.materials = response;
            }
        })
    }

    function getdatademand() {
        AdminFactory.GetDataDemand().success(function (response) {
            if (response != "") {
                $scope.demands = response;

            }
        });
    }
    ;


    $scope.modalmaterial = function (id) {
        var filterDemand = $filter('filter')($scope.demands, id);
        $scope.demands_detail = filterDemand[0];
        $scope.$modalInstance = $modal.open({
            scope: $scope
            , animation: true
            , ariaLabelledBy: 'modal-title'
            , ariaDescribedBy: 'modal-body'
            , templateUrl: 'modal-detail-material.html'
            , controller: 'AdminDemandController'
            , size: 'lg'
        })
        $scope.cancel = function () {
            $scope.$modalInstance.dismiss('cancel');
        };
    };

    getdatademand();

    $scope.material_select = [];

    $scope.checknow = function (id) {
        var data = {"id": id};
        $scope.material_select.push(data);
        var material = $scope.material_select;
        console.log(JSON.stringify(material));
    }

    $scope.NewRequestDemandModal = function () {
        getdatamaterial();
        $scope.$modalInstance = $modal.open({
            scope: $scope
            , animation: true
            , ariaLabelledBy: 'modal-title'
            , ariaDescribedBy: 'modal-body'
            , templateUrl: 'button-new-request-modal.html'
            , controller: 'AdminDemandController'
            , size: 'lg'
        })
        $scope.cancel = function () {
            $scope.$modalInstance.dismiss('cancel');
        };
    };

    $scope.SubmitNewDemand = function (input) {
        var material_select = [];
        angular.forEach($scope.materials, function (item) {
            if (item.selected) {
                if (item.qty != undefined) {
                    material_select.push({id: item.id, qty: item.qty});
                }
            }
        })

        var data = {title: input.title, reqdate: input.reqdate, material: material_select, notes: input.notes};
        AdminFactory.PostNewDemand(data).success(function (response) {
            if (response.status == "OK") {
                $scope.$modalInstance.dismiss();
                toastr.success(response.message);
            }
        })
        getdatademand();
    }
})

controllers.controller('AdminApiAccessController', function ($scope, $localStorage, $state, $stateParams, $modal, $rootScope, md5, jwtHelper, AdminFactory, AdminTokenService, toastr, Upload)
{
    AdminTokenService.checkToken();
    AdminFactory.GetApiAccess().success(function (response) {
        if (response.response == 'OK') {
            $scope.content = response.data;
            $scope.content.last_username = response.data.username;
        } else {
            toastr.warning("");
        }
    })
    $scope.checkValidate = function () {
        var datas = {"username": $scope.content.username, "password": $scope.content.password};
        AdminFactory.ValidateApiAccess(datas).success(function (response) {
            if (response.response == 'OK') {
                toastr.success("Validate match");
            } else {
                toastr.warning("Validate not match, check your email !");
            }
        })

    }

    $scope.changeAccess = function () {
        var datas = {
            "id": $scope.content.id,
            "username": $scope.content.username,
            "password": md5.createHash($scope.content.password),
        };
        console.log(JSON.stringify($scope.content));
        AdminFactory.ChangeApiAccess(datas).success(function (response) {
            if (response.response == 'OK') {
                toastr.success(response.message);
                $scope.content = datas;
            } else {
                toastr.warning(response.message);
            }
        })
    }
})


