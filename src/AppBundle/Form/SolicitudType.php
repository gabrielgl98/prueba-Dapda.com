<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array ('label_attr'=> array("class" => "control-label"), 'attr' => array("class" => "form-control",)))
                ->add('apellidos', TextType::class, array ('label_attr'=> array("class" => "control-label"), 'attr' => array("class" => "form-control",)))
                ->add('telefono', IntegerType::class, array ('label_attr'=> array("class" => "control-label"), 'attr' => array("class" => "form-control",)))
                ->add('email', TextType::class, array ('label_attr'=> array("class" => "control-label"), 'attr' => array("class" => "form-control",)))
                //creamos algunos select en disabled para que no sea posible cambiar datos durante la carga de la pagina
                ->add('tipoVehiculo', ChoiceType::class, array('label' => 'Tipo de Vehículo','label_attr'=> array("class" => "control-label"), 'attr' => array ('class' => 'tipoVehiculo form-control' , 'disabled' => true,),
                      'choices'  => array(
                          'Sin Especificar' => "Sin Especificar",
                          'Turismo' => "Turismo",
                          'Todo Terreno' => "Todo Terreno",
                          'Comercial' => "Comercial",

                      )))
                ->add('vehiculo', ChoiceType::class, array('label' =>'Vehículo','label_attr'=> array("class" => "control-label"), 'attr' => array ('class' => 'vehiculo form-control', 'disabled' => true,),   'choices'  => array(
                      'Sin Especificar' => "Sin Especificar",
                      'Corsa' => "Corsa",
                      'Astra' => "Astra",
                      'Mokka' => "Mokka",
                      "Crossland" => "Crossland"
                  ),'data' => "Sin Especificar"))
                ->add('preferenciaLlamada', ChoiceType::class, array('label' => 'Preferencia de Llamada', 'label_attr'=> array("class" => "control-label"), 'attr' => array("class" => "form-control preferencia"),
                      'choices'  => array(
                          'Mañana' => "Mañana",
                          'Tarde' => "Tarde",
                          'Noche' => "Noche",
                      )))
                ->add('enviarSolicitud', SubmitType::class , array('label' =>'Solicitar ',  'attr' => array ('class' => 'enviarsolicitud btn btn-default', 'disabled' => true)));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Solicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_solicitud';
    }


}
