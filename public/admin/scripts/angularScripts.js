/**
 * Created by Namila Radith on 2016-03-20.
 */

function angularCreateQuestionerHandeller(token){
var app = angular.module('AmalyaReach',[]);
app.constant("CSRF_TOKEN", token);
app.controller('questionController',function($scope,$http,CSRF_TOKEN) {

    $scope.questionerTitle= "";
    $scope.items = [];
    $scope.answerTypes = [
        {answerTypeID : 'R' , answerTypeName: 'Rating'},
        {answerTypeID : 'A' , answerTypeName: 'Answer'},
    ];

    $scope.addQuestion = function(){
        $scope.items.push({
            question: "",
            questionType: ""
        });
        //$scope.question = {};
    };

    //remove question from the JSON object
    $scope.removeItem = function(index){
        $scope.items.splice(index,1);
    }

    //check the maximum question limit
    $scope.isFull = function(){
        if($scope.items.length < 5 )
            return true;
        else
            return false;
    }

    //check questions are avilable
    $scope.isEmpty = function(){
        if($scope.items.length <= 0 )
            return true;
        else
            return false;
    }


    $scope.sendData = function(){
        $http({
            method:'POST',
            url : 'create/new',
            data: {
                '_token': CSRF_TOKEN,
                'questionerTitle':$scope.questionerTitle,
                'Questions' : $scope.items

            }
        }).success(function(data,status,headers,config){

            $scope.items = [];
            $scope.questionerTitle= "";
            swal("Created!", "New questioner has been created ", "success");
            console.log("Done");
        });
    };

});

}