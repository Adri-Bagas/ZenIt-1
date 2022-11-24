@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/login-regist.css')}}">
@endsection

@section('content')
<div class="main-content" id="main-content">
  <div class="forms-container">
      <div class="signin-signup">
          <!-- sign in -->
          <form action="#" class="sign-in-form">
              <h2 class="title">Sign in</h2>
              <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Username" />
              </div>
              <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Password" />
              </div>
              <div class="checkbox-remember">
                  <input type="checkbox" name="remember" id="remember">
                  <label for="remember">Remember Me</label>
                </div>
              <input type="submit" value="Login" class="btn solid" />
              <p class="social-text">Or Sign in with social platforms</p>
              <div class="social-media">
                  <!-- <a href="#" class="social-icon">
                      <i class="fab fa-facebook-f"></i>
                  </a> -->
                  <a href="#" class="social-icon">
                      <i class="fab fa-google"></i>
                  </a>
              </div>
          </form>

          <!-- sign up -->
          <form action="#" class="sign-up-form">
              <h2 class="title">Sign up</h2>
              <div class="name">
                  <div class="input-field">
                  <input type="text" placeholder="First Name" />
              </div>
              <div class="input-field">
                  <input type="text" placeholder="Last Name" />
              </div>
              </div>
              
              <div class="input-field">
                 
                  <input type="text" placeholder="Username" />
              </div>
              <div class="input-field">
          
                  <input type="email" placeholder="Email" />
              </div>
              <div class="input-field">
         
                  <input type="password" placeholder="Password" />
              </div>
              <input type="submit" class="btn" value="Sign up" />
              <p class="social-text">Or Sign up with social platforms</p>
              <div class="social-media">
                  <!-- <a href="#" class="social-icon">
                      <i class="fab fa-facebook-f"></i>
                  </a> -->
                  <a href="#" class="social-icon">
                      <i class="fab fa-google"></i>
                  </a>
              </div>
          </form>
      </div>
  </div>

  <div class="panels-container">
      <div class="panel left-panel">
          <div class="content" >
              <!-- <img src="https://o.remove.bg/downloads/edd74264-5df1-44d3-874d-a1d8768667be/user-rating-feedback-customer-reviews-cartoon-web-icon-e-commerce-online-shopping-internet-buying-trust-metrics-top-rated-product-vector-isolated-concept-metaphor-illustration_335657-2753-removebg-pre.png" alt=""> -->   
              <img src="assets/tigan & bianka pose 2.png" alt="" >
              <h3>Didn't Have an account yet ?</h3> <br>
           
              <button class="btn transparent" id="sign-up-btn">
                  Sign up
              </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
          <div class="content" >      
              <!-- <img src="https://o.remove.bg/downloads/20a99977-b693-4b3b-bfb7-f95080934435/Group_of_customers_shopping_in_online_store_and_huge_tablet-removebg-preview.png" alt=""> -->
              <img src="assets/tigan & bianka pose 2.png"  alt="">
              <h3>Have an account already?</h3> <br>
        
              <button class="btn transparent" id="sign-in-btn">
                  Sign in
              </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
      </div>
  </div>
</div>
@endsection