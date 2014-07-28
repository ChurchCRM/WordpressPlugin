jQuery('html').attr('ng-app', 'wpChurchInfo');
var app = angular.module('wpChurchInfo', []);

app.filter('unsafe', function($sce) {
    return function(val) {
        return $sce.trustAsHtml(val);
    };
});
