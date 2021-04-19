@extends('layouts.app')

@section('content')
    <style>
        #sell-car-form {
            padding: 30px 90px;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 15px;
        }
        h3 {
            padding: 40px 0;
        }
        h6 {
            padding-bottom: 20px;
        }
        form {
            padding-bottom: 40px;
        }
        input {
            position: relative;
            top: 30px;
            text-align: center;
        }
    </style>
    <div class="section-divider"></div>
    <div class="bg-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 offset-sm-4" style="background:whitesmoke; margin-bottom: 50px">
                    <div class="vin-wrapper text-center">
                        <form action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/vin">
                            <h3>Your Online Ad Begins Here</h3>
                            <h6>
                                Enter your VIN to get started. We will automatically pull up the details
                            </h6>
                            <div class="col-sm-12">
                                <input type="text" name='vin' class="form-control" placeholder="Enter VIN here" />
                            </div>
                            <div class="col-sm-12" style="margin-top: 80px">
                                <button class="btn btn-primary">Get Started</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
