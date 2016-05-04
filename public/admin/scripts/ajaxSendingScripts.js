/**
 * Created by Namila Radith on 2016-04-04.
 */

//submit feedback handelling function
function submitFeedback() {
    console.log("Length : " + $('input[id^="feedback-"]').length);

    JSONAsnwers = [];

    $('input[id^="feedback-"]').each(function (input) {


        var value = $(this).val();
        var id = $(this).attr('id');
        id = id.split(" ");
        id = id[0].split("-");
        id = id[1];

        JSONAsnwers.push({id: id, value: value});


        //console.log('ID : '+id + ' VALUE : ' + value);
        //console.log("loop");
    });

    var data2 = JSON.stringify(JSONAsnwers);
    console.log(data2);
    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-Token': $("#_token").val()
            }
        });


    //create and send ajax request to the server
    $.ajax({

        method: "post",
        url: '/send-feedback',
        data: {data: JSONAsnwers},

        //on success remove loading animation & clear fields
        success: function (data) {
            $(".feedback_btn").hide();

            swal("success!", "Thank you for your feedback", "success");

        },
        error:function(data){
            swal("Error!", "Error occured ", "error");
        }



    });

}

//newsletter
$(document).ready(function () {
    $("#newsletter_5").validate({
        //set rules
        rules: {
            email_newsletter_5: {
                required: true,
                email: true,


            }

        },

        //set messages
        messages: {
            email_newsletter_5: {
                required: "Please enter email address",
                email: "Please enter valid email address",

            }
        }
    });


    //listen submit event
    $("#newsletter_5").submit(function (e) {
        //check is validation successes
        if ($("#newsletter_5").valid()) {
            // CSRF protection
            $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    }
                });


            //create and senf ajax request to the server
            $.ajax({

                method: "post",
                url: '/add-subscriber',
                data: {
                    email: $("#email_newsletter_5").val(),


                },

                //on success remove loading animation & clear fields
                success: function (data) {
                    $("#email_newsletter_5").val('');
                    //alert(data);
                    swal("success!", data, "success")
                }


            });

        }

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();

    });


});
