@extends('layouts.app')

@section('content')
      
<div class="container mb-3" style="background-color:  rgb(163, 165, 163)">
  <div class="row py-5 mt-4 align-items-center">
      <!-- For Demo Purpose -->
      <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
          <img src="https://pngimg.com/uploads/khabib/khabib_PNG24.png" alt="" class="img-fluid mb-3 d-none d-md-block">
          <h1>Create an Account</h1>
          <p class="font-italic text-muted mb-0"> Join Khabibs Team, Sign Up on VipBET.KZ. Approved by Khabib Hurmagomedov!</p>
          
      </div>

      <!-- Registeration Form -->
      <div class="col-md-7 col-lg-6 ml-auto">
          <form action="#">
              <div class="row">

                  <!-- First Name -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-user text-muted"></i>
                          </span>
                      </div>
                      <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                  </div>

                  <!-- Last Name -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-user text-muted"></i>
                          </span>
                      </div>
                      <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                  </div>

                  <!-- Email Address -->
                  <div class="input-group col-lg-12 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-envelope text-muted"></i>
                          </span>
                      </div>
                      <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                  </div>

                  <!-- Phone Number -->
                  <div class="input-group col-lg-12 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-phone-square text-muted"></i>
                          </span>
                      </div>
                      <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                          <option value="">+8</option>
                          <option value="">+7</option>
                          <option value="">+6</option>
                          <option value="">+5</option>
                      </select>
                      <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                  </div>.

 

                  <!-- Password -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-lock text-muted"></i>
                          </span>
                      </div>
                      <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                  </div>

                  <!-- Password Confirmation -->
                  <div class="input-group col-lg-6 mb-4">
                      <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-lock text-muted"></i>
                          </span>
                      </div>
                      <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                  </div>

                  <!-- Submit Button -->
                  <div class="form-group col-lg-12 mx-auto mb-0">
                      <a href="#" class="btn btn-block py-2" style="background-color: black; color: white;">
                          <span class="font-weight-bold">Create your account</span>
                      </a>
                  </div>

                  <!-- Divider Text -->
                  <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                      <div class="border-bottom w-100 ml-5"></div>
                      <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                      <div class="border-bottom w-100 mr-5"></div>
                  </div>

                  <!-- Social Login -->
                  <div class="form-group col-lg-12 mx-auto">
                      <a href="#" class="btn   btn-block py-2 btn-facebook" style="background-color: black; color: white;">
                          <i class="fa fa-facebook-f mr-2"></i>
                          <span class="font-weight-bold">Continue with Facebook</span>
                      </a>
                      <a href="#" class="btn   btn-block py-2 btn-twitter" style="background-color: black; color: white;">
                          <i class="fa fa-twitter mr-2"></i>
                          <span class="font-weight-bold">Continue with Twitter</span>
                      </a>
                  </div>

                  <!-- Already Registered -->
                  <div class="text-center w-100">
                      <p class="text-muted font-weight-bold">Already Registered? <a href="#" class="text-primary ml-2">Login</a></p>
                  </div>

              </div>
          </form>
      </div>
  </div>
</div>

 @endsection
 
