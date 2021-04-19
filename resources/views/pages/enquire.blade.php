<style>
    .enquire-wrapper {
        background: whitesmoke;
        padding: 40px;
        margin: 0 auto;
        box-shadow: 15px 15px 20px -6px rgba(0, 0, 0, 0.15);
    }
    .enquire-wrapper h2 {
        text-align: center;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .enquire-wrapper p {
        font-size: 16px;
        font-weight: 500;
        text-align: center;
    }
    .enquire-wrapper .input-wrapper {
        margin-bottom: 20px;
    }
    .response-message {
        padding: 10px 20px;
        text-align: center;
        color: white;
        font-weight: 600;
        font-size: 20px;
        background: #55a920;
        margin-bottom: 20px;
        border-radius: 5px;
        margin-top: -20px;
        border: 1px solid green;
        display: none;
    }
</style>
<div class="section-divider"></div>
<div class="container enquire-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="response-message">
            </div>
        </div>
    </div>
    <form action="/send-enq" class="enquire" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="seller_id" value="{{$product->user->id}}">
        <div class="row">
            <div class="col-sm-12">
                <h2>{{\App\Helper::t('your_enquire')}}</h2>
                <p>Contact <strong>{{$product->brand}}</strong> about this <strong>{{$product->title}}</strong></p>
            </div>
            <div class="col-sm-12" style="font-size: 18px">
                <div class="form-group">
                    <i class="fa fa-phone"></i>&nbsp;&nbsp;{{$product->user->phone}}
                </div>
                <div class="form-group">
                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;{{$product->user->email}}
                </div>
            </div>
            <div class="col-sm-6 input-wrapper">
                <input required type="text" class="form-control" name="first_name" placeholder="{{\App\Helper::t('first_name')}}">
            </div>
            <div class="col-sm-6 input-wrapper">
                <input required type="text" class="form-control" name="last_name" placeholder="{{\App\Helper::t('last_name')}}">
            </div>
            <div class="col-sm-12 input-wrapper">
                <input required type="email" class="form-control" name="email" placeholder="{{\App\Helper::t('email')}}">
            </div>
            <div class="col-sm-12 input-wrapper">
                <input required type="text" class="form-control" name="phone" placeholder="{{\App\Helper::t('phone')}}">
            </div>
            <div class="col-sm-12 input-wrapper">
                <textarea required name="message" class="form-control" placeholder="{{\App\Helper::t('message')}}" rows="5"></textarea>
            </div>
            <div class="col-sm-12 text-center form-group" style="font-size: 17px">
                <input type="checkbox" style="margin-top: 20px" required>&nbsp;By using this service, you accept the terms of our Visitor Agreement
            </div>
            <div class="col-sm-12 text-center">
                <button id="enquireForm" class="theme-btn">{{\App\Helper::t('send_to_seller')}}</button>
            </div>
        </div>
    </form>
</div>
<div class="section-divider"></div>
