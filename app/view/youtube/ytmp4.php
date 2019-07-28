        
        <header class="masthead text-white text-center" style="height: 80vh;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">Youtube to MP4 Conveter</h1>
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
    youtubeconvert: function(link){
         $.post('../public/ytmp4/ytconvert',{'yturl':link},
        function(data){

       console.log(data);
    })

  }
})
</script>
<script type="text/javascript">
$('#convert-btn').click('click',function(e){
    e.preventDefault();
    var link = $('#yturl').val();
     if(link == null || link ==""){
      alert("Please Enter the Youtube Video URL");
      $('#yturl').focus();
      return false;
     }else{
       $.youtubeconvert(link);
     }
})
</script>



