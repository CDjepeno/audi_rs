<?php

class DefaultController extends AbstractController
{
    /**
     * Affichage de l'index par defaut
     *
     * @return void
     */
    public function index()
    {
        $this->renderView("index_view",[
            "products"=> Product::getProductsInIndex()
        ]);
    }
}