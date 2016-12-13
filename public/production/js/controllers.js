var controllers = angular.module('app.controllers', [])

controllers.controller('AdminController', function (
        $scope, $localStorage, $state, $stateParams, $modal, $rootScope, md5,
        jwtHelper, AdminFactory, AdminTokenService, toastr, fileUpload, Upload)
{
//    AdminTokenService.checkToken();

    //For Refresh

    var refreshData = function () {
        AdminFactory.GetDataContent().success(function (response) {
            if (response.response != "FAIL") {
                $scope.content = response.data;
                $rootScope.allContent = response.data;
            } else {
                toastr.warning(response.message);
            }
        })
    }

//IF admin.dashboard state
    if ($state.current.name == 'admin.dashboard') {
        refreshData();
    }

// FOR login admin
    $scope.LoginAdmin = function () {
        input = {
            username: $scope.logindata.username
            , password: md5.createHash($scope.logindata.password)
        };
//        console.log(JSON.stringify(input));
        AdminFactory.AdminLogin(input).success(function (response) {
            if (response.status == "OK") {
                $localStorage.production_token = response.token;
                toastr.success(response.message);
                $state.go('admin.dashboard');
            } else {
                toastr.warning(response.message);
            }
        });
    };

    //FOR DASHBOARD
    //For Button Add Modal
    $scope.buttonAdd = function (size) {
        $scope.$modalInstance = $modal.open({
            scope: $scope
            , animation: true
            , ariaLabelledBy: 'modal-title'
            , ariaDescribedBy: 'modal-body'
            , templateUrl: 'button-add-modal.html'
            , controller: 'AdminController'
            , size: size
        })
        $scope.cancel = function () {
            $scope.$modalInstance.dismiss('cancel');
        };
    };

    //for edit data , redirect to this if $stateParams is contentEditID
    if ($stateParams.contentEditSeq) {
        var contentEditSeq = $stateParams.contentEditSeq;
        AdminFactory.GetDataContentSeq(contentEditSeq).success(function (response) {
            if (response.response != "FAIL") {
//                console.log(JSON.stringify(respon));
                $scope.contentEdit = response.data;
                $rootScope.content_seq = response.data.seq;
                $scope.pageAction = "edit";
                $scope.itemData = response.data.detail_content;
                $scope.addItem = function () {
                    var newItemNo = $scope.itemData.length + 1;
                    $scope.itemData.push({'sort_number': newItemNo, 'detail_item': ''});
                };
                $scope.removeItem = function () {
                    var lastItem = $scope.itemData.length - 1;
                    $scope.itemData.splice(lastItem);

                };
                $scope.checkDetailItem = function (value, key) {
                    var checkbox = document.getElementById('checkbox_' + key);
                    var detail_keterangan = document.getElementById('detailKeterangan_' + key);
//                    if (value != '') {
                    if (checkbox.checked) {
                        detail_keterangan.style.display = 'block';
                    } else {
                        detail_keterangan.style.display = 'none';
                    }
                }
            } else {
                toastr.warning(response.message);
                $state.go('admin.dashboard');
            }
        });

    }

//for view data , redirect to this if $stateParams is contentEditID
    if ($stateParams.contentViewSeq) {
        var contentViewSeq = $stateParams.contentViewSeq;
        AdminFactory.GetDataContentSeq(contentViewSeq).success(function (response) {
            if (response.response != "FAIL") {
//                console.log(JSON.stringify(respon));
                $scope.contentEdit = response.data;
                $scope.pageAction = "view";
            } else {
                toastr.warning(response.message);
                $state.go('admin.dashboard');
            }
        });
        refreshData();
    }
    ;
    //For Submit Add Data
    $scope.submitAddData = function () {
        input = {
            "judul": $scope.input.judul,
        };
//        console.log(JSON.stringify(input));
        AdminFactory.AddData(input).success(function (response) {
            if (response.response != "FAIL") {
                $scope.$modalInstance.dismiss();
                toastr.success(response.message);
                refreshData();
//                console.log($scope.content);
            } else {
                toastr.warning(response.message);
            }
        })

    };
    $scope.setImage = function () {
        console.log('test');
        var file = $scope.contentEdit.imgFront;
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e) {
            $scope.contentEdit.gambar_url = e.target.result;
        }
    }
//    FOR SUBMIT EDIT DATA
    $scope.submitEditData = function () {
        //For Update Data record
        var data_input = [];
        angular.forEach($scope.itemData, function (value, key) {
            if (value.detail_item == undefined) {
                value.detail_item = "";
            }
            data_input.push({
                'detail_konten_seq': value.seq
                , 'kategori_seq': value.kategori_seq
                , 'sort_number': value.sort_number
                , 'poin': value.item
                , 'detail_keterangan_tambahan': value.detail_item
            })
        });

        datas = {
            "seq": $rootScope.content_seq
            , "judul": $scope.contentEdit.judul
            , "deskripsi": $scope.contentEdit.deskripsi_pendek
            , "video_url": $scope.contentEdit.video_url
            , "detail_aturan": data_input
        };
//        console.log(JSON.stringify(datas));

        AdminFactory.EditData(datas).success(function (response) {
            if (response.response != "FAIL") {
                toastr.success(response.message);
            } else {
                toastr.warning(response.message);
            }
        })
//        Upload Gambar Depan

        if ($scope.contentEdit.imgFront != undefined) {
            var imgFront = $scope.contentEdit.imgFront;
            var content_seq = $rootScope.content_seq;
            fileUpload.uploadFileToUrl(imgFront).success(function (response) {
                console.log(JSON.stringify(response));
                if (response.response == "OK") {
                    toastr.success(response.message);
                } else {
                    toastr.warning(response.message);
                }
                $scope.contentEdit.imgFront = undefined;
            })
        }


//        console.log(JSON.stringify(datas));
    };
});

controllers.controller('AdminMaterialController', function (
        $scope, $localStorage, $state, $stateParams, $modal, $rootScope, md5,
        jwtHelper, AdminFactory, AdminTokenService, toastr, fileUpload, Upload) {

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
        jwtHelper, AdminFactory, AdminTokenService, toastr, fileUpload, Upload) {

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
    }
})


