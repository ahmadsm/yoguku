var directives = angular.module('app.directives', []);

//directives.directive('fileModel', ['$parse', function ($parse) {
//        
//        return {
//            restrict: 'A',
//            link: function (scope, element, attrs) {
//                var model = $parse(attrs.fileModel);
//                var modelSetter = model.assign;
//                console.log("I'am filemodel directive");
//                element.bind('change', function () {
//                    scope.$apply(function () {
//                        modelSetter(scope, element[0].files[0]);
//                    });
//                });
//            }
//        };
//    }]);