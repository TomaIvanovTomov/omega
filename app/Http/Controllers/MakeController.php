<?php

namespace App\Http\Controllers;

use App\Make;
use App\Product;
use Illuminate\Http\Request;

class MakeController extends Controller
{

    public function getMakeModels(Request $request)
    {
        $make = Make::where("id", $request->get('id'))->first();
        $html = "<div class='row'>";
        $vars = explode("&", $_SERVER['HTTP_REFERER']);
        $selected = [];
        foreach ($vars as $var) {
            if (strpos($var, "car-model") !== false) {
                $id = explode("=", $var);
                $selected[] = end($id);
            }
        }
        foreach ($make->models as $model) {
            $count = Product::where("model_id", $model->id)->count();
            $class = $count ? "" : "disable-area";
            $m_selected = in_array($model->id, $selected);
            $html .= "<div class='col-sm-2' style='margin-top: 20px'>
                        <label class='container-checkbox $class' for='' onclick='filterClick(this, \"model\")'>
                            <span class='value-name'>{$model->title}&nbsp;($count)</span>
                            <input type='checkbox' ".($m_selected ? "checked" : "" )." name='car-model[]' class='filter-checkbox' value='{$model->id}'>
                            <span class='checkmark ".($m_selected ? "checked-bg" : "")."'>
                                ".($m_selected ? "<i class='fa fa-check check-mark'></i>" : "")."
                            </span>
                        </label>
                     </div>";
        }
        $html .= "</div>";
        return $html;
    }

}
