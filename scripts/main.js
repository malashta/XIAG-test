/**
 * Created by Serge Tallerr on 26-Mar-16.
 * mail-to: malashta@gmail.com
 * Russia, Novosibirsk
 * https://vk.com/serge.tallerr
 * https://ru.linkedin.com/in/tallerr
 * https://facebook.com/serge.tallerr
 * twitter @SergeTallerr
 * skype: Serge.tallerr
 */

var xiag;

xiag = angular.module("xiag", [], function($httpProvider)
{
    // Используем x-www-form-urlencoded Content-Type
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    // Говорим что все запросы через AJAX сыпятся:
    $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    // Переопределяем дефолтный transformRequest в $http-сервисе
    $httpProvider.defaults.transformRequest = [function(data)
    {
        var param = function(obj)
        {
            var query = '';
            var name, value, fullSubName, subValue, innerObj, i;

            for(name in obj)
            {
                value = obj[name];

                if(value instanceof Array)
                {
                    for(i=0; i<value.length; ++i)
                    {
                        subValue = value[i];
                        fullSubName = name + '[' + i + ']';
                        innerObj = {};
                        innerObj[fullSubName] = subValue;
                        query += param(innerObj) + '&';
                    }
                }
                else if(value instanceof Object)
                {
                    for(subName in value)
                    {
                        subValue = value[subName];
                        fullSubName = name + '[' + subName + ']';
                        innerObj = {};
                        innerObj[fullSubName] = subValue;
                        query += param(innerObj) + '&';
                    }
                }
                else if(value !== undefined && value !== null)
                {
                    query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
                }
            }

            return query.length ? query.substr(0, query.length - 1) : query;
        };

        return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
    }];
});

xiag.controller("frontPage", function($scope,$http){

    $scope.submit=function(){
        $http.post('/',{url:$scope.url,method:'add'})
            .success(function(data){
                if(data.status=='ok')$scope.resultUrl=data.shorturl;
                if(data.status=='error')$scope.resultUrl=data.message;
            });
    }

});