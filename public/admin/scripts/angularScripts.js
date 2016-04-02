/**
 * Created by Namila Radith on 2016-03-20.
 */

function angularQuestionerHandeller(token,data){
var app = angular.module('AmalyaReach',[]);

//constant variable store token value
app.constant("CSRF_TOKEN", token);
//constant variable store data passesd from server as JSON
app.constant("DATA_JSON", data);

app.controller('questionController',function($scope,$http,CSRF_TOKEN,DATA_JSON) {

    $scope.questionerTitle= "";
    $scope.questionerID= 0;
    $scope.items = [];
    $scope.answerTypes = [
        {answerTypeID : 'R' , answerTypeName: 'Rating'},
        {answerTypeID : 'A' , answerTypeName: 'Answer'},
    ];

    $scope.addQuestion = function(){
        $scope.items.push({
            questionID: 0,
            question: "",
            questionType: ""
        });
        //$scope.question = {};
    };

    //remove question from the JSON object
    $scope.removeItem = function(item){
        $scope.items.splice($scope.items.indexOf(item),1);
    };

    //check the maximum question limit
    $scope.isFull = function(){
        if($scope.items.length < 5 )
            return true;
        else
            return false;
    };

    //check questions are avilable
    $scope.isEmpty = function(){
        if($scope.items.length <= 0 )
            return true;
        else
            return false;
    };


    $scope.createQuestioner = function(){
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

        $scope.updateQuestioner = function(){
        $http({
            method:'POST',
            url : $scope.questionerID  +'/update',
            data: {
                '_token': CSRF_TOKEN,
                'questionerID' :  $scope.questionerID ,
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

    //function retrieve  all questioner data and set it on UI
    $scope.getData = function(){
           if(DATA_JSON !== null ) {
               //pass JSON array to JS OBJECT
               console.log(DATA_JSON);
               var questionerObj = JSON.parse(DATA_JSON);
                $scope.questionerTitle = questionerObj.questioner.questioner_title;
                $scope.questionerID = questionerObj.questioner.id;

               //iterate on each questions in question array
               for (i = 0 ; i < questionerObj.questions.length; i++  ) {
                   $scope.items.push({
                       questionID: questionerObj.questions[i].id,
                       question: questionerObj.questions[i].question,
                       questionType: questionerObj.questions[i].question_type
                   });
               }
           }
    };

});

}