<?php

namespace App\Controllers;

use App\Models\PromotionModel;
use InvalidArgumentException;

class PromotionController extends BaseController
{
    protected PromotionModel $promotionModel;

    public function __construct()
    {
        $this->promotionModel = new PromotionModel();
    }

    public function updateForm() {
        return view("operateur/UpdatePromotion");
    }

    public function update() {
        $promo = $this->request->getPost("quantite");

        $data = [
            'quantite' => $promo,
        ];
        
        $this->promotionModel->update(1,$data);

        return view("dashboard");
    }
}
