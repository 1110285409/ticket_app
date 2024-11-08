<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class TicketController extends Controller
{
    public function show($id)
{
    $servicios = [
        1 => ['nombre' => 'Acceso carpetas compartidas', 'descripcion'=> 'Puedes solicitar creación de carpetas, eliminación de carpetas, crear grupos, modificación de grupos, asignación de permisos, eliminar permisos.'],
        2 => ['nombre' => 'Borrado de información', 'descripcion' => 'Servicio solicitado para borrar información de los equipos.'],
        3 => ['nombre' => 'Configurar Perfil de Equipos','descripcion' => 'Acceso a las carpetas compartidas, puedes solicitar creación de carpetas, eliminación de carpetas, crear grupos, modificación de grupos, asignación de permisos, eliminar permisos.'],
        4 => ['nombre' => 'Crear usuario-Ingreso colaborador nuevo', 'descripcion' => 'Administración en la creación de usuarios, grupos, configuración, accesos y privilegios que tendrán los usuarios del sistema a cada una de las aplicaciones y archivos que se encuentren instaladas en el GECC'],
        5 => ['nombre' => 'Falla aplicación de Negocio', 'descripcion' => 'Ajustar a, Reporte de fallas, bloqueos, caída de la aplicación, lentitud, errores de acceso, mensajes de error que se le presente en el uso diario o al ejecutar su actividad con la aplicación core de negocio, como: Cobis, Smart Atentos, EBS, Peoplenet, Daruma, Csis, Smart Coloca, Atentos, Campus Virtual, Fasticketing, Marketing Dinámico, Taylor, Listas, SIR, Pasaporte Coomeva, Remedy,Easy Access,Comparador, agente virtual, chatbot, Capacity,Reserva de Salas,Gestión de viajes (Tiquete/Hotel), chat en linea, VPN, Sico, Dgnet, Gestor campaña,Mi coomeva, SIMGR,Saber Coomeva y en aplicaciones del GECC entre otras.'],
        6 => ['nombre' => 'Falla de impresión', 'descripcion' => 'Reportar fallas asociadas al servicio de impresión, tales como la impresora no me registra, envío a imprimir y sale un mensaje de error, las impresiones salen con manchas o líneas, atasco de papel, impresora sin tóner, entre otros.'],
        7 => ['nombre' => 'Falla de aplicaciones de oficina','descripcion'=> 'Reporte de las fallas que se presentan al realizar las actividades diarias en las aplicaciones de oficina: Excel, Word, PowerPoint, Adobe Reader, Adobe Acrobat Writer, Adobe Realer Professional, Open Office, Project, Visio, Office 365, VPN Forticlient y aplicaciones de mensajería como Lync, Skype Empresarial, Spark, Microsoft Teams.'],
        8 => ['nombre' => 'Falla en Equipo de Cómputo', 'descripcion' => 'Una falla de equipo es un problema que impide que un dispositivo funcione correctamente, y puede ser causado por desgaste, errores humanos, defectos de fabricación, factores ambientales o problemas eléctricos.'],
        9 => ['nombre' => 'Firewall (Enrutamiento)', 'descripcion' => 'Servicio de seguridad perimetral, reglas de firewall, enrutamientos'],
        10 => ['nombre' => 'Licencia Office 365', 'descripcion' => 'Solicitud de Licencia E1 y E3'],
        11 => ['nombre' => 'Solicitudes de acceso', 'descripcion' => 'Son todas las novedades presentadas con los usuarios o los accesos que se solicitan actualizar o modificar, como: activar cuenta de usuario, asignar privilegios, cambiar contraseña, desbloquear usuario, inactivar usuario, inactivar privilegios, inscribir colaboradores en el campus virtual, modificar información de usuario y parametrizar cuenta.'],
        12 => ['nombre' => 'Windows', 'descripcion' => 'Son todas las novedades presentadas con los usuarios o los accesos que se solicitan actualizar o modificar, como: activar cuenta de usuario, asignar privilegios, cambiar contraseña, desbloquear usuario, inactivar usuario, inactivar privilegios, inscribir colaboradores en el campus virtual, modificar información de usuario y parametrizar cuenta.'],
        13 => ['nombre' => 'Administrativo', 'descripcion' => 'Se destacan actividades como; Asesoría, Asistencia a Reuniones, elaboración y publicación de actas, revisión de la facturacion y participación y gestión a proyectos.'],
        14 => ['nombre' => 'Aplicaciones', 'descripcion' => 'Se realizan actividades como: Capacitar, Generar informes, gestionar la administración de usuarios SQL Server, solicitar Instalaciones.'],
        15 => ['nombre' => 'Desarrollo', 'descripcion' => 'Se realizan actividades de desarrollo, como: Administración de las aplicaciones, Admon, monitoreo y compilación PN, Admon, monitoreo y compilación pruebas, Alistamiento de ambientes para testeo, Aplicación archivos planos recaudos, Apoyo cierre mensual, Creación de nuevas App, Despliegue de las NC, Monitoreo depuración cartera, Monitoreo Facturacion electronica'],
        16 => ['nombre' => 'Microinformática', 'descripcion' => 'Se realizan actividades como; Acceso Carpetas compartidas,  Configuración de correo. Embalaje y solicitud de despacho, Inventario Activos, Realizar pruebas,Solicitud ingreso equipos al DA, Gestión de garantías,Gestion de Equipos de Computo.'],
        17 => ['nombre' => 'Seguridad', 'descripcion' => 'Se realizan actividades de seguridad, como: Cifrado equipo, Bloqueo puertos, O365, Request CSR, Vulnerabilidades equipos, Vulnerabilidades servidores, Administración de puertos fw y gestión de Legalidad aplicaciones']
    ];

 


    if (!array_key_exists($id, $servicios)) {
        abort(404, 'Ticket no encontrado');
    }

    $ticket = $servicios[$id];
    $calificaciones = [5, 4, 4.5, 3, 5]; 

    return view('ticket.show', [
        'ticket' => $ticket,
        'calificaciones' => $calificaciones,
        'id' => $id,
    ]);
}

public function requestForm()
    {
        return view('ticket.requestForm'); // Asegúrate de tener esta vista en 'resources/views/ticket/requestForm.blade.php'
    }

    public function submit(Request $request)
    {
        // Validación del formulario
        $validatedData = $request->validate([
            'servicio' => 'required',
            'capacidad' => 'required',
            'centro_costo' => 'required',
            'autorizador' => 'required',
            'usuario_red' => 'required',
            'cargo' => 'required',
            'descripcion' => 'required',
        ]);

        // Lógica para guardar los datos, por ejemplo:
        // TicketRequest::create($validatedData);

        return redirect()->route('catalogo.index')->with('success', 'La solicitud ha sido enviada correctamente');
    }
}