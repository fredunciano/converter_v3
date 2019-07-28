
    <header class="masthead text-white text-center" style="height: 80vh;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">Youtube to MP3 Conveter</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control" type="text" id="yturl"></div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-block btn-lg" type="button" id="convert-btn">Convert</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" id="result">
            
        </div>
    </header>
    <section class="features-icons bg-light text-center" style="padding-top: 50px;">
        <div class="row">
            <div class="col">
                <h1 class="top-heading">3 Easy Steps</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 step_col">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><img src="assets/img/video.png" class="step_icon"></div>
                        <h3>1. Search&nbsp;</h3>
                        <p class="lead mb-0">Search on youtube and copy the url</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><img src="assets/img/paste.svg" class="step_icon"></div>
                        <h3>2. Paste&nbsp;</h3>
                        <p class="lead mb-0">Paste the copied url&nbsp;</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><img src="assets/img/convert.png" class="step_icon"></div>
                        <h3>3. Convert</h3>
                        <p class="lead mb-0">Click convert, wait and download</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img whychooseimg"><span></span></div>
                <div class="col-lg-6 my-auto order-lg-1 showcase-text">
                    <h2>Why Choose YTMP3</h2>
                    <p class="lead mb-0"><br>Are you tired of trying to find a fast and reliable to mp3 converter music from YouTube that would allow you to download videos and favorite music tracks? And your attempts to find an easy alternative to get your files for free
                        failed because you are getting offered pay entry-fees at suspicious "free from charge" sites, that ask for payment at the very last moment? And how about constant search for a decent converting system for your phone? We are happy
                        to introduce the YTMP3- best service for your needs.<br><br></p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img whychooseimg"><span></span></div>
                <div class="col-lg-6 my-auto order-lg-1 showcase-text">
                    <h2>Listen To Music Anywhere</h2>
                    <p class="lead mb-0"><br>You can seamlessly transfer the MP3 files you downloaded from your desktop to your MP3 player, phone, or music library.<br><br></p>
                </div>
            </div>
        </div>
    </section>
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
    <section class="call-to-action text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h2 class="mb-4">Please send your suggestion s and comments to improve our services</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row text-center d-flex flex-row justify-content-center">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg" type="email" placeholder="Enter your email..." style="margin-bottom: 10px;"><textarea class="form-control form-control-lg" placeholder="Message.." style="height: 150px;"></textarea>
                                <button
                                    class="btn btn-primary" type="button" id="contact-btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script>
  $.extend({
    youtubeconvert: function(link){
         $.post('../public/ytmp3/ytconvert',{'yturl':link},
        function(data){

          var aa = $.parseJSON(data);
          var  html; 
         
         if(aa['error'] != null){
    
            html ='<div class="alert alert-warning"><strong>Warning!</strong> Something went wrong, Possible reasons!</div><br><ul><li>Check Youtube video URL.</li><li>Maybe That video have been deleted.</li><li>Maybe You have entered something else except URL.</li></ul>';
           
         }else if(aa['download'].length != 0){
           

            html = '<div class="row res_thumbnail"><div class="col text-right"><img src="'+aa['thumbnail_url']+'" id="res_thumbnail"></div><div class="col"><div class="row"><div class="col text-left">';
            html+='<a href="'+aa['download']['data']['html']+'" target="_blank"><button class="btn btn-success border rounded" type="button" id="download-btn">DOWNLOAD</button></a>';
            html+='</div></div><div class="row no-gutters d-flex d-lg-flex d-xl-flex flex-column justify-content-center justify-content-xl-center" style="margin-top: 10px;"> <div class="col text-left"><span class="badge badge-primary">By: '+aa['author_name']+'</span></div><div class="col text-left"><span class="badge badge-warning" id="res_info"><h4>'+aa['title']+'</h4></span></div></div></div></div>';



          
        }
         $('#result').html(html);
      
    });
    }

  })
</script>
<script type="text/javascript">
$('#convert-btn').click('click',function(e){
    alert();
    e.preventDefault();
    var link = $('#yturl').val();
    console.log(link);return false;
     if(link == null || link ==""){
      alert("Please Enter the Youtube Video URL");
      $('#yturl').focus();
      return false;
     }else{
       $.youtubeconvert(link);
     }
})
</script>



