<?php
$car_price = isset($data['price']) && isset($data['car-price']) ? $data['car-price'] : $data['price'];
?>
<div id="car-details">
    <h2>{{$data['year']}} {{$data['make']}} {{$data['model']}}</h2>
    <hr>
    <p style="font-size: 18px;">Estimate Price</p>
    <h1>${{$car_price}}</h1>
    @if(isset($data['mileage']))

        <h5>Car Details <span style="float: right"><i class="fa fa-caret-down car-details-carret"></i></span></h5>
        <div class="car-details">
            <table class="table">
                <tr>
                    <td>Mileage</td>
                    <td>{{$data['mileage']}}</td>
                </tr>
                <tr>
                    <td>Condition</td>
                    <?php $condition = \App\Condition::where('id', $data['condition'])->first() ?>
                    <td>{{$condition->title}}</td>
                </tr>
                @if(1==2)
                <tr>
                    <td>Trim</td>
                    <?php $trim = \App\Trim::where('id', $data['trim'])->first() ?>
                    <td>{{$trim->title}}</td>
                </tr>
                @endif
                <tr>
                    <td>Transmission</td>
                    <td>{{$data['transmission']}}</td>
                </tr>
                <tr>
                    <td>Engine</td>
                    <td>{{$data['engine']}} kW</td>
                </tr>
                <tr>
                    <td>Exterior Color</td>
                    <?php $c = \App\Color::where('id', $data['exterior_color'])->first() ?>
                    <td>{{$c->title}}</td>
                </tr>
                <tr>
                    <td>Interior Color</td>
                    <?php $c = \App\Color::where('id', $data['interior_color'])->first() ?>
                    <td>{{$c->title}}</td>
                </tr>
            </table>
        </div>
        <hr>
    @endif

    @if(isset($data['types']))
        <h5>Features <span style="float: right"><i class="fa fa-caret-down car-features-carret"></i></span></h5>
        <div class="car-features">
            <table class="table">
                <?php $types = explode(",", $data['types']) ?>
                @foreach($types as $type)
                    <?php $type = \App\Type::where('id', $type)->first() ?>
                    <tr>
                        <td>{{$type->title}}</td>
                        <td><i class="fa fa-check"></i></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <hr>
    @endif

    <h5><?= isset($data['price']) && isset($data['car-price']) ? "Price: $".$data['price'] : "" ?></h5>
</div>
