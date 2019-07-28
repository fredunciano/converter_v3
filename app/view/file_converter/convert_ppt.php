
        <header class="masthead text-white text-center" style="height: 80vh;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">Powerpoint Conveter</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <!-- <form id="form" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <div class="custom-file" id="customFile" lang="es">
                                    <input type="file" class="custom-file-input" id="input_file" name='myFile' aria-describedby="fileHelp" style="height: 200px">
                                    <label class="custom-file-label" for="exampleInputFile">
                                       Select file...
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-block btn-lg" type="button" id="convert-btn">Convert</button></div>
                        </div>
                    </form> -->
                      <form id="form" method="post" enctype="multipart/form-data">
              
                <div class="span5">
                    <div class="fileupload fileupload-new span5" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i><span class="fileupload-preview"></span></div>
                            <span class="btn btn-file"><span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span><input type="file" name="upload_file" id="upload_file" />
                            </span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            <input type="submit" value="Upload" class="btn fileupload-exists btn-primary" />
                        </div>
                        
                    </div>
                </div>
            </form>
                </div>
            </div>
        </div>
        <div class="container" id="result">
            
        </div>
    </header>
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5 top-heading">Other Services</h2>
            <div class="row">
                <div class="col-lg-4 otherservices">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/ppt.png">
                        <h5>Powerpoint to Image</h5>
                        <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                    </div>
                </div>
                <div class="col-lg-4 otherservices">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/docx.png">
                        <h5>Docx to PDF</h5>
                        <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                    </div>
                </div>
                <div class="col-lg-4 otherservices">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/pdf.png">
                        <h5>PDF to TEXT</h5>
                        <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
  $.extend({
    youtubeconvert: function(file){
         $.post('../public/convertppt/uploadfile',{'file':file},
        function(data){

       console.log(data);
    })

  },
  uploadFile: function() {

 
       var file = $.trim($('#input_file').val());

       if (file.length <= 0) {
           alert('<p class="bootbox-text">Please select file to upload</p>')
       } else {
           var path  = '../public/convertppt/uploadfile';
           var options = {
               target: '#fupForm',
                url: path,
                beforeSubmit: function(){
                    $('#loader').html('Uploading file <img src="../images/ajax-loader.gif">').attr('class','alert alert-info');
                },
                success: function(data) {
                    var ret = data.split('|');
                    var success = parseInt(ret[0],10);
                    if (success === 0) {
                        $('#loader').html(ret[1]).attr('class','alert alert-error');
                    } else {
                        $('#loader').html(ret[1]).attr('class','alert alert-info');
                    }
               }
              };
              $('fupform').ajaxSubmit(options);
       }
   }
})
</script>
<script type="text/javascript">
// $('#input_file').on('change',function(e){
    
//     e.preventDefault();
//     var myformobj = $(this).closest('form');
//     var formdata = new FormData(myformobj[0]);

//     $.ajax({
//         url:'../public/convertppt/uploadfile',
//         method: 'POST',
//         data: formdata,
//         cache: false,
//         processData: false,
//         success: function(data){
//             console.log(data);
//         }
//     })
// })
    $("#form").on('submit',(function(e){
            e.preventDefault();

            $.ajax({
                url: "../public/convertppt/uploadfile",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function()
                {                    
  
                    $("#result").attr('class','alert alert-info');
                },
                success: function(data)
                {   
                    data = $.parseJSON(data);
                    console.log(data);
                    // $('#result').html(data.message);
                    // if(data.message == 'Failed'){

                    //     $("#result").html('Invalid file. Try another file.');
                    //     $("#result").attr('class','alert alert-danger');
                    // }
                    // if(data.message == 'Invalid'){

                    //     $("#result").html('Invalid file. Please upload file .xls');
                    //     $("#result").attr('class','alert alert-danger');
                    // }
                    // if (data.message == 'Success'){
                    //     $("#result").html('Successfully Uploaded');
                    //     $("#result").attr('class','alert alert-success');
                    // }

                }

            });

        }));
</script>




