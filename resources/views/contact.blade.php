@extends('layouts.app')

@section('content')

      
     <section class="section">

      <!--Section heading-->
       
    
      <div class="card">
    
        <div class="card-body">
    
          <!--Google map-->
          <div id="map-container-google-12" class="z-depth-1-half map-container-7" style="height: 200px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11968.047093220244!2d76.8981583461717!3d43.2339159042267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3883692f027581ad%3A0x2426740f56437e63!2z0JzQtdC20LTRg9C90LDRgNC-0LTQvdGL0Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgiDQuNC90YTQvtGA0LzQsNGG0LjQvtC90L3Ri9GFINGC0LXRhdC90L7Qu9C-0LPQuNC5!5e0!3m2!1sru!2skz!4v1601005455894!5m2!1sru!2skz" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              style="border:0" allowfullscreen></iframe>
          </div>
    
          <div class="row mt-4">
    
            <!--Grid column-->
            <div class="col-md-6 mb-4">
              <form>
    
                <div class="md-form">
                  <input type="text" id="contact-name" class="form-control" placeholder="Your name">
                  <label for="contact-name" class=""></label>
                </div>
    
                <div class="md-form">
                  <input type="text" id="contact-email" class="form-control" placeholder="Your email">
                  <label for="contact-email" class=""></label>
                </div>
    
                <div class="md-form">
                  <input type="text" id="contact-Subject" class="form-control" placeholder="Subject">
                  <label for="contact-Subject" class=""></label>
                </div>
    
              </form>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-md-6 mb-4">
              <div class="md-form primary-textarea">
                <textarea id="contact-message" class="md-textarea form-control mb-0" rows="5" style="padding-bottom: 1.2rem;">Your message</textarea>
                <label for="contact-message"></label>
              </div>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-md-12">
              <div class="text-center">
                <a class="btn btn-mdb-color btn-block " style="background-color: black; color: #fff;">Send Message</a>
              </div>
            </div>
            <!--Grid column-->
    
          </div>
    
        </div>
    
      </div>
    
    </section>

@endsection