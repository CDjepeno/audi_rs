<?php
 session_start();

class OrderController extends AbstractController
{
    /**
     * fonction permettant de renvoyer l'utisateur vers la page de login
     */
    public function __construct()
    {
        $session = new Session();
        if(!$session->isLogged())
        {
            $this->redirectTo("index.php?class=user&action=login");
        }
    }

    /**
     * Récupère la commande d'un utilisateur
     *
     * @return void
     */
    public function commande()
    {
        $orders = Order::getByUser($_SESSION['user']['id']); 
        // dd($orders);       
        $this->renderView('user/orders_view',
        ['orders' => $orders]);
    }


    /**
     * Récupère le détail d'une commande d'un utilisateur
     *
     * @return void
     */
    public function orderdetails()
    {
        $orderUser = Order::getByUser($_SESSION['user']['id']);
        $orders    = Product::getByOrderId(htmlspecialchars($_GET['id']));

        $this->renderView('user/order_details_view', [
            'orders'       => $orderUser,
            'orderdetails' => $orders
        ]);
    }

    /**
     * Calcule le total des commandes faites par un membre.
     */
    public function ordercount()
    {
        $total_product = Product::getCountProduct($_SESSION['user']['id']);
        $total_cmd     = Order::getCountOrder($_SESSION['user']['id']);

        $this->renderView('user/dashboard', [
            'total_prd' => $total_product,
            'total_cmd' => $total_cmd
        ]);
    }

    /**
     * Ajoute une commande à la base de donnée
     *
     * @return void
     */
    public function addcommande()
    {
        $product = Product::getProductById(htmlspecialchars($_GET['id']));
        $idProduct = $product->getId();
        $price   = $product->getBuy_price();
        $id_user = $_SESSION['user']['id'];


        $order = new Order();
        $order->setTotal($price);
        $order->setUser_id($id_user);

        $orderdetail = new OrderDetails();
        if($orderdetail->isbookable($idProduct)) {

            $orderdetail->setN_Commande($order->add());
            $orderdetail->setId_product($_GET['id']);

            if($orderdetail->add()) {
                $orders = Order::getByUser($_SESSION['user']['id']); 
                $this->renderView('user/orders_view',
                ['orders' => $orders]);
            } else {
                $alert ="Une érreur est survenue lors de la commande";
                $this->renderView('product_view',[
                    'alert'   => $alert,
                    'product' => Product::getProductById(htmlspecialchars($idProduct))
                ]); 
            }
            
        } else {
            $alert ="Le véhicule est déja commander";
            $this->renderView('product_view',[
                'alert'   => $alert,
                'product' => Product::getProductById(htmlspecialchars($idProduct))
            ]);
        }
    }

}