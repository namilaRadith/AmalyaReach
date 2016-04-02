/**
 * Created by Namila Radith on 2016-03-24.
 */


var table;
$(function () {

    function loadQuestionerTable() {
        table = $("#questionerTable").DataTable({

            "ajax": {
                "url": 'manage/get-questioners',
                "dataSrc": ""

            }
            ,

            "columns": [
                {"data": "id"},
                {"data": "questioner_title"},
                {"data": "publish"},
                {"data": "created_at"},
                {"defaultContent": '<button id="btnView" class="btn btn-sm btn-info center-block ">view</button>'},
                {
                    "data": "publish",
                    "render": function (data) {
                        return (data === 'NO' ? '<button id="btnPublish" class="btn btn-sm btn-success center-block">publish</button>' :
                            '<button class="btn btn-sm btn-success center-block disabled">publish</button>');
                    }
                },

                {
                    "data": "publish",
                    "render": function (data) {
                        return (data === 'NO' ? '<button id="btnEdit" class="btn btn-sm btn-warning center-block">edit</button>' :
                            '<button class="btn btn-sm btn-warning center-block disabled">edit</button>');
                    }
                },
                {"defaultContent": '<button class="btn btn-sm btn-danger center-block ">delete</button>'}

            ],

            select: true,
            "destroy": true


        });

    };

    loadQuestionerTable();

    //view button on click event
    $('#questionerTable tbody').on('click', '#btnView', function () {

        var data = table.row($(this).parents('tr')).data();
        console.log(data);
        getQuestions(data['id']);


    });

    //edit button on click event
    $('#questionerTable tbody').on('click', '#btnEdit', function () {

        var data = table.row($(this).parents('tr')).data();
        console.log(data);

        var url = 'manage/edit-questioner/' + data['id'];
        // do something with the url client side variable, for example redirect
        window.location.href = url;


    });

    //publish button on click event
    $('#questionerTable tbody').on('click', '#btnPublish', function () {

        var data = table.row($(this).parents('tr')).data();
        var button = table.row($(this).find('#btnPublish'));
        console.log(data);


        $.ajax({
            method: "GET",
            url: 'manage/publish-questioner/' + data['id'],
            success: function (data) {
                loadQuestionerTable();
                swal("Published !", "Questioner has been successfully published ", "success");


            },
            error: function (d) {
                swal("Error", "Operation was fail due to internal error ", "error");
            }

        });


    });


});


$("#questionsTable").DataTable();


function getQuestions(id) {

    var t = $("#questionsTable").DataTable({

        "ajax": {
            "url": 'manage/get-questions/' + id,
            "dataSrc": ""

        }
        ,

        "columns": [

            {"data": "question"},
            {"data": "question"},
            {"data": "question_type"},


        ],

        "destroy": true

    });

    t.on('order.dt search.dt', function () {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}

