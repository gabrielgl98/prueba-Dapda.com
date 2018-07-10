<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Solicitud;
use AppBundle\Form\SolicitudType;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class PromocionController extends Controller
{
  /**
   * @Route("/promocion", name="promocion")
   */
  public function promocionAction(Request $request)
  {

      //cogemos el parametro preferencia por si lo hemos pasado
      $preferencia = $request->query->get('preferencia');
      //lo convertimos a mayusculas para evitar confusiones
      $preferencia = strtoupper($preferencia);
      //ahora pondremos el select preferencia solo en modo escritura mediante un script dependiendo del parametro pasado
      // deshabilitaremos el campo y le pondremos un valor que hayamos escogido por defecto
      if ($preferencia == "MAñANA") {
        //llamamos a la funcion que se encuentra en promocion.js, esta funcion pondra el campo introducido por la url en solo lectura
        echo "<script>";
        echo "window.onload = function (){
          var momento = 'Mañana';
          AsignarPreferencia(momento);
        }";

        echo "</script>";

      } else if ($preferencia == "TARDE") {
        //llamamos a la funcion que se encuentra en promocion.js, esta funcion pondra el campo introducido por la url en solo lectura
        echo "<script>";
        echo "window.onload = function (){
          var momento = 'Tarde';
          AsignarPreferencia(momento);
        }";        echo "</script>";

      } else if ($preferencia == "NOCHE") {
        //llamamos a la funcion que se encuentra en promocion.js, esta funcion pondra el campo introducido por la url en solo lectura
        echo "<script>";
        echo "window.onload = function (){
          var momento = 'Noche';
          AsignarPreferencia(momento);
        }";        echo "</script>";

      }
      //ruta que nos manda al formulario para reservar el vehiculo
      //creamos el formulario que tendremos en /promociones

      // dump($preferencia); exit;
      $formularioSolicitud= $this->createForm(SolicitudType::class, new Solicitud);
      $formularioSolicitud->handleRequest($request);

      if ($formularioSolicitud->isSubmitted()) {
        $Solicitud = $formularioSolicitud->getData();


        if ( $formularioSolicitud->isValid()) {
          //Si el formulario es valido añadimos a la base de datos

          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($Solicitud);
          $entityManager->flush();

          //mandamos un correo al usuario
          //cogemos los parametros del swiftmailer (rellenados en config.yml)
          $mailer = $this->container->get('mailer');

          //creamos el mensaje
          $message = \Swift_Message::newInstance()
              ->setSubject('Solicitud Opel')
              ->setFrom('promocion.opel@gmail.com')
              ->setTo($Solicitud->getEmail())
              ->setBody(
                  $this->renderView(
                      'promocion/mail.html.twig',["nombre" => $Solicitud->getNombre()]
                  ), 'text/html'
              )
          ;


          $mailer->send($message);

          //creamos una variable de session donde indicaremos que ha hecho el formulario y puede acceder a la ventana de gracias_promocion
          $session = $request->getSession();
          $session->set('gracias_promocion', true);

          //redirigimos a /gracias-promocion
          return $this->redirectToRoute('gracias_promocion');

        }else{
          //llamamos al validador para asi poder mostrar por pantalla los errores de nuestro $formularioSolicitud
          //validamos la solicitud y pasamos un array de errores para mostrarlos por pantalla
          $validator = $this->get('validator');
          $error = $validator->validate($Solicitud);
          return $this->render('promocion/promocion.html.twig', ["formulario" => $formularioSolicitud->createView(), "error" => $error]);

          // return $this->redirectToRoute('promocion', ["error" => $error]);
        }
      }



      return $this->render('promocion/promocion.html.twig', ["formulario" => $formularioSolicitud->createView()]);

  }

  /**
   * @Route("/gracias-promocion", name="gracias_promocion")
   */
  public function graciaspromocionAction(Request $request)
  {
    //comprobamos si puede acceder o no mediante la variable de session
    //si es true accedera, si no lo es llevara al formulario
    // $session = new Session();
    $session = $request->getSession();
    $acceso=$session->get('gracias_promocion');
    $session->set('gracias_promocion', false);

    if ($acceso==true) {
      return $this->render('promocion/gracias-promocion.html.twig');
    }else {
      return $this->redirectToRoute('promocion');
    }

  }

}
