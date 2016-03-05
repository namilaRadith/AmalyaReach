@extends('admin_master_page')
@section('css_ref')
    @parent

@stop
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Create News Letter</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body pad">
            <form method="post" id="sendNL">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="exampleInputEmail1">Subject</label>
                        <input type="text" class="form-control" id="newsLetterSubject" name="newsLetterSubject" placeholder="Enter Subject">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">News letter body</label>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                    </div>

                    <input type="button" id="submitNewsLetter" class="btn btn-default" name="submitNewsLetter" value="Send News Letter">



            </form>

        </div>



    </div>
    <!-- /.box -->

@stop
@section('js_ref')
    @parent
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>'
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');

        });

        $('.message').hide();
        //function to handle waiting animation
        function loader(task){
            if(task === 'start')
                $('.box').append("<div class=\"overlay\" > <i class=\"fa fa-refresh fa-spin\"></i> </div>");
            if(task === 'stop')
                $('.overlay').remove();
        }

        //news letter submit button click
        $('#submitNewsLetter').click(function(){
            var newsLetterBody = CKEDITOR.instances["editor1"].getData();

            // CSRF protection
            $.ajaxSetup(
                    {
                        headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                    });

            //waiting animation start
            loader('start');

            //create and senf ajax request to the server
            $.ajax({

                method: "post",
                url: 'create/send' ,
                data: {
                        subject: $("#newsLetterSubject").val() ,
                        body: newsLetterBody,

                },

                //on success remove loading animation & clear fields
                success:function(data){
                    loader('stop');
                    $("#newsLetterSubject").val('');
                    CKEDITOR.instances["editor1"].setData('');
                    swal("Sent!", "You news letter has successfully sent to "+data+" subscibers ", "success");
                    //alert(data);
                },

                error:function(){
                    loader('stop');
                    swal("Connecttion failed!", "Please check your internet connection and try again ! ", "error");
                }

            });

        });


    </script>





@stop