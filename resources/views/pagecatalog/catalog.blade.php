@extends('layouts.app')

@section('content')
<style>
.container2 {
    border-radius: 5px;
    /* background-color: rgb(255, 0, 0); */
    padding: 15px;
}

.overlay {
    background: #f9f6f3;
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.5;
}

.imgloading {
    position: absolute;
    left: 50%;
    top: 80%;
    width: 5%;
}

input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.card {
    flex-direction: row;
    align-items: center;
    max-width: 18rem;
    border-style: none;
}

.card-body{
    background-color: #f57520;
    border: none;
    color: white;
    border-radius: 25%;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}

.card-title {
    font-size: 20px;
    font-weight: bold;
}

.title {
    border-radius: 5%;
    position: block;
    top: 60px;
    font-size: 42px;
    font-weight: bold;
    background-color: #e4e2e0;
    width: 250px;
    text-align: center;
}

/* .card img {
    width: 30%;
    border-top-right-radius: 0;
    border-bottom-left-radius: calc(0.25rem - 1px);
} */


@media only screen and (max-width: 768px) {
    a {
        display: none;
    }

    .card-body {
        padding: 0.5em 1.2em;
    }

    .card-body .card-text {
        margin: 0;
    }

    .card img {
        width: 50%;
    }
}

@media only screen and (max-width: 1200px) {
    .card img {
        width: 40%;
    }
}
</style>
<h1 class="title">Catalog Menu</h1>

<form class="from" method="post" enctype="multipart/form-data" id="form_submit">
    <div class="container2">
        <br />
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-3">
                <div class="card text-center text-black bg-light mb-3">
                    <a href="/hardware" class="card-body btn btn-dark btn-sm">
                        <BR>
                        <i class="fa fa-television fa-5x" style="color:#fafafa;text-shadow: 5px 5px 10px rgb(0, 0, 0);" aria-hidden="true"></i>
                            <BR>
                            <BR>
                        <h5 class="card-title">Hardware</h5>
                        <p class="card-text ">
                            <font size="3px">- อุปกรณ์ต่างๆ</font><BR>
                            <font size="3px">- Permission</font><BR>
                            <BR>

                        </p>
                    </a>
                </div>
            </div>

            <div class="col mb-3">
                <div class="card text-center text-black bg-light mb-3">

                    <a href="/software" class="card-body btn btn-dark btn-sm">
                        <BR>
                        <i class="fa fa-cogs fa-5x" style="color:#fafafa;text-shadow: 5px 5px 10px rgb(0, 0, 0);" aria-hidden="true"></i>
                            <BR>
                        <h5 class="card-title">Software</h5>
                        <p class="card-text ">
                            <font size="3px">- โปรแกรม</font><BR>
                            <font size="3px">- Data</font><BR>
                            <font size="3px">- Customize</font><BR>
                            <font size="3px">- Permission</font><BR>

                        </p>

                    </a>
                </div>
            </div>

            <div class="col mb-3">
                <div class="card text-center text-black bg-light mb-3">

                    <a href="/network" class="card-body btn btn-dark btn-sm">
                        <BR>
                        <i class="fa fa-lock fa-5x" style="color:#fafafa;text-shadow: 5px 5px 10px rgb(0, 0, 0);" aria-hidden="true"></i>
                        <BR>
                        <BR>

                        <h5 class="card-title">Network & Communicate</h5>
                        <p class="card-text ">
                            <font size="3px">- สิทธิ์การใช้งาน</font><BR><BR><BR>

                        </p>

                    </a>
                </div>
            </div>



            <div class="col mb-3">
                <div class="card text-center text-black bg-light mb-3">
                    <a href="/userinfo" class="card-body btn btn-dark btn-sm">
                        <BR>
                        <i class="fa fa fa-user fa-5x" style="color:#fafafa;text-shadow: 5px 5px 10px rgb(0, 0, 0);" aria-hidden="true"></i>
                        <BR>
                            <BR>
                        <h5 class="card-title">User Information</h5>
                        <p class="card-text ">
                            <font size="3px">- ข้อมูลผู้ใช้</font><BR><BR>
                            <BR>

                        </p>

                    </a>
                </div>
            </div>

            <div class="col mb-3">
                <div class="card text-center text-black bg-light mb-3">
                    <a href="/action" class="card-body btn btn-dark btn-sm">
                        <BR>
                        <i class="fas fa-running fa-5x" style="color:#fafafa;text-shadow: 5px 5px 10px rgb(0, 0, 0);" aria-hidden="true"></i>
                            <BR>
                            <BR>
                        <h5 class="card-title">Action Master</h5>
                        <p class="card-text ">
                            <BR>
                            <BR>
                            <BR>


                        </p>

                    </a>
                </div>
            </div>

            <!-- <div class="col mb-3">
                <div class="card text-center text-black bg-light mb-3" style="max-width: 18rem;">
                    <i class="fa fa-cogs fa-5x" style="color:#C9C900;" aria-hidden="true"></i>
                    <a href="/Queing/Dashboard/Index" class="card-body btn btn-dark">
                        <b class="card-title">ADD+</b>
                        <p class="card-text ">
                           <BR>
                           <BR>
                           <BR>
                           <BR>
                        </p>

                    </a>
                </div>
            </div> -->





        </div>

        <br />

</form>

@endsection
@include('inc.footer')


