@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Eliah")
@section('content')
<style>
.banner-page2,
#banner-footer,
footer,
#menu-other {
    display: none !important;
}


.errortop h1 {
    font-family: Spartan-bold;
    font-weight: 900;
    font-size: 200px;
    color: #E9625C;
}

.errortop h4 {
    font-family: Spartan-bold;
    font-weight: 900;
    font-size: 36px;
    color: #111;
    letter-spacing: 7px;
    margin: 35px 0px 35px 0px;
}

.errortop h5 {

    font-weight: 900;
    font-size: 18px;
    color: #111;
    margin-bottom: 35px;
}

.errorbot input {
    width: 400px;
    height: 55px;
}

.errorbot h5 {
    font-size: 15px;
    font-family: Spartan-bold;
    font-weight: 900;
    color: #111;
    border-bottom: 2px solid red;
}

.errorbot {
    display: flex;
}


/* Bootstrap 4 text input with search icon */

#error-page .has-search .form-control {
    padding-left: 2.375rem;

}

#error-page .has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;

}

.errorback {
    padding: 19px;
}
.errormain{
    padding-top:200px;
    background-image: url("{{asset('public/frontEnd/images/product/maxresdefault.jpg')}}");
}
</style>
<div class="wp-container container">
    <div class="row">
        <div class="errormain col-lg-7">
            <div class="errortop">
                <h1>Oops!</h1>
                <h4>404 PAGE NOT FOUND</h4>
                <h5>This page couldn't be found! Back to home page if you like. Please use search for help!</h5>
            </div>
            <div class="errorbot">
                <form action="" method="get" id="error-page">
                    <div class="input-group">
                        <input style="border-right: none; " type="text" class="form-control"
                            placeholder="Enter keyword">
                        <div class="input-group-append">
                            <button
                                style="text-align: center;pointer-events: none;background: inherit;border-left: none;border: 1px solid #ced4da;padding-right: 20px;"
                                type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="errorback">
                    <a href="">
                        <h5>BACK TO HOMEPAGE</h5>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection