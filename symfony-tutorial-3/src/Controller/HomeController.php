<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Cliente;
use App\Entity\Pedido;
use App\Entity\Producto;

class HomeController extends AbstractController
{
    /**
    * @Route("/home", name="home")
    */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $cliente = new Cliente();
        $cliente->setDni('DNI1');
        $cliente->setNombre('NombreCliente1');
        $cliente->setEmail('email1@email1.com');
        $entityManager->persist($cliente);

        $pedido = new Pedido();
        $pedido->setCliente($cliente);
        $pedido->setReferencia('ReferenciaPedido1');
        $entityManager->persist($pedido);

        $product = new Producto();
        $product->setReferencia('ReferenciaProducto1');
        $product->setNombre('NombreProducto1');
        $product->setPrecio(123.12);
        $entityManager->persist($product);

        $entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HomeController.php',
        ]);
    }
}
