<?php

class ProductController extends AbstractController
{
    public function __construct() {

        $session = new session();

    }
    /**
     * Fonction permettant de voir un produit par catégory
     *
     * @return void
     */
    public function show()
    {
        
        $this->renderView('product_view',[
            'product' => Product::getProductById(htmlspecialchars($_GET['id'])),
        ]);
    }

    /**
     * Fonction permettant de voir tout les produits par catégory.
     *
     * @return void
     */
    public function getbycategory()
    {
        $this->renderView('product_by_category_view',[
            'products' => Product::getProductsByCategory(htmlspecialchars($_GET['id'])),
        ]);
    }

    /**
     * Fonction permettant de récupérer les véhicules vendu par l'utilisateur
     *
     * @return void
     */
    public function sale()
    {
        $this->renderView('user/cars_sale_view',[
            'products' => Product::getProductByIdUser(htmlspecialchars($_SESSION['user']['id']))
        ]);
    }

    /**
     * Fonction permettant de supprimer la voiture d'un membre dans la base de donnée
     *
     * @return void
     */
    public function delete()
    {
        $products = Product::delete(htmlspecialchars($_GET['id']));
        $this->renderView("user/cars_sale_view",[
        'products' => Product::getProductByIdUser(htmlspecialchars($_SESSION['user']['id']))
        ]);
    }

    /**
     * Fonction permettant de modifier un produit
     *
     * @return void
     */
    public function edit()
    {
        $alert=[];
        $sucess = [];
        $product = Product::getProductById(htmlspecialchars($_GET['id']));
        $product_name = $product->getName();
        // dd($product_name);
        if(isset($_POST['submit_edit']))
        {
            if(!empty($_POST['description'])
            && !empty($_POST['buyPrice'])
            && !empty($_POST['idCategory'])
            && !empty($_FILES))
            {
                $tabValue2 = explode('_',$_POST['idCategory']);
                $idCategory = $tabValue2[0];
                $idUser = $_SESSION['user']['id'];
                
                $file_name = basename($_FILES['fichier']['name']);
                $file_tmp_name = $_FILES['fichier']['tmp_name'];
                $file_dest = "assets/img/upload/".$file_name;

                $extensions = array('.png','.gif','.jpg','.jpeg');
                $extension = strrchr($_FILES['fichier']['name'],'.');

                if(in_array($extension, $extensions) && preg_match('#[1-9]#',$_POST['buyPrice'])){
                    if(move_uploaded_file($file_tmp_name, $file_dest)){
                        $car = new Product();
                        $car->setId_category($idCategory);
                        $car->setId_user($idUser);
                        $car->setName($_POST['name']);
                        $car->setDescription($_POST['description']);
                        $car->setBuy_price($_POST['buyPrice']);
                        $car->setPath($file_name);

                        if($car->edit(htmlspecialchars($_GET['id']))) {
                            $sucess = "votre véhicule as bien été modifier";
                        }else{
                            $alert = "vous n'avez pas ajouter votre véhicule";
                        }             
                    }else{
                        $alert= "Une erreure est survenu lors de l'envoi du fichier";
                    }     
                }else{
                    $alert = "Vous avez rentreé un prix incorect ou le fichier n'est pas au bon format";
                }
            }else{
                $alert ="Veuillez remplir tous les champs";                
            }      
        }
        $this->renderView('user/edit_cars',[
            'alert' => $alert, 
            'sucess' => $sucess,
            'product_name' => $product_name
            ]);
    }

    /**
     * Fonction permettant d'ajouter un véhicule dans la bdd
     */
    public function addCar()
    {
        $alert = [];
        $sucess = [];
        if(isset($_POST['submit_product']))
        {   
            if (!empty($_POST['name'])
            && !empty($_POST['description'])   
            && !empty($_POST['buy_price'])
            && !empty($_POST['id_category'])
            && !empty($_FILES))
            {
                $tabValue2 = explode('_',$_POST['id_category']);
                $idUser = $_SESSION['user']['id'];
                $idCategory = $tabValue2[0];
                
                $file_name = basename($_FILES['fichier']['name']);
                $file_tmp_name = $_FILES['fichier']['tmp_name']; 
                $file_dest = "assets/img/upload/".$file_name;

                $extensions = array('.png','.gif','.jpg','.jpeg','.webp');
                $extension = strrchr($_FILES['fichier']['name'],'.');

                if(in_array($extension, $extensions) && preg_match('#^[1-9]{1,20}#',$_POST['buy_price'])){
                    if(move_uploaded_file($file_tmp_name, $file_dest)){
                        $car = new Product();
                        $car->setId_category($idCategory);
                        $car->setId_user($idUser);
                        $car->setName($_POST['name']);
                        $car->setDescription($_POST['description']);
                        $car->setBuy_price(htmlentities($_POST['buy_price']));
                        $car->setPath($file_name);

                        if($car->add()){
                            $sucess = "votre véhicule as bien été ajouter";
                        }else{
                            $alert = "vous n'avez pas ajouter votre véhicule";
                        }             
                    }else{
                        $alert= "Une erreure est survenu lors de l'envoi du fichier";
                    }   
                }else{
                    $alert = "Vous avez rentré un prix incorect ou le fichier n'est pas au bon format";
                }    
            }else{
                $alert ="Veuillez remplir tous les champs";                
            }          
        }   
        $this->renderView('user/add_cars',[
            'alert' => $alert, 
            'sucess' => $sucess
            ]);   
    }

    /**
     * Ajoute un véhicule au favoris
     *
     * @return void
     */
    public function wishlist()
    {

        $wishlist=[];

        if(!isset($_SESSION["favoris"]))
        {
            $_SESSION["favoris"]=[];
        }  

        if(isset($_GET['id']))
        {
            $product = Product::getProductById(htmlspecialchars($_GET['id']));
            $idproduct = $_GET['id'];
                        
            if(!array_search($product ,$_SESSION["favoris"])){
                array_push($_SESSION["favoris"], $product);
            } 
            foreach($_SESSION["favoris"] as $p){
                        $wishlist[]= [$p]; 
                    }     
                $this->renderView('user/wishlist_view',[
                    "wishlist" => $wishlist,
                ]);
        }else {
            foreach($_SESSION["favoris"] as $p){
                $wishlist[]= [$p]; 
            }
            $this->renderView('user/wishlist_view',[
                "wishlist" => $wishlist,
            ]);
        }
              $this->renderView('user/wishlist_view',[
            "wishlist" => $wishlist,
        ]);
    }

    
    /**
     * Supprimer une véhicule au favoris
     *
     * @return void
     */
    public function remove_wishlist()
    {
        $wishlist=[];

        $product = Product::getProductById($_GET['id']);
        $id_product=$product->getId();

        if(isset($_GET['id']))
        {
            $key = array_search($_GET['id'] ,$_SESSION["favoris"] );
            array_splice($_SESSION["favoris"] , $key, 1);
    
            foreach($_SESSION["favoris"] as $id_product){
                $wishlist[]= [$id_product];  
            }
        }   

        $this->renderView('user/wishlist_view',[
            "wishlist" => $wishlist,
            "product" => Product::getProductById($_GET['id']),

        ]);

    }
    
}
