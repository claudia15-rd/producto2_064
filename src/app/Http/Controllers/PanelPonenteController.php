<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Acto;
use App\Models\Ponente;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;

class PanelPonenteController extends Controller
{
    public function getFutureEvents() {
        $idPersona = session('personId');
        $actos = Ponente::GetFutureEvents($idPersona);
        $eventosAgrupados = array();

        foreach ($actos as $evento) {
            $fecha = $evento->Fecha; // Ajusta el formato según tu estructura de fecha

            if (!isset($eventosAgrupados[$fecha])) {
                $eventosAgrupados[$fecha] = array();
            }

            $eventosAgrupados[$fecha][] = $evento;
        }
        return view('panel-ponente-futuros')->with('actos', $eventosAgrupados);
    }
    public function getPastEvents() {
        $idPersona = session('personId');
        $actos = Ponente::GetPastEvents($idPersona);
        $eventosAgrupados = array();

        foreach ($actos as $evento) {
            $fecha = $evento->Fecha; // Ajusta el formato según tu estructura de fecha

            if (!isset($eventosAgrupados[$fecha])) {
                $eventosAgrupados[$fecha] = array();
            }

            $eventosAgrupados[$fecha][] = $evento;
        }
        return view('panel-ponente-pasados')->with('actos', $eventosAgrupados);
    }
    public function postBajaActo(Request $request) {
        $acto = $request->input('id');
        $idPersona = session('personId');
        Ponente::where('Id_acto', $acto)->where('Id_persona', $idPersona)->delete();
        return redirect()->back();
    }

    public function getDocuments(Request $request) {
        $acto = $request->query('id');
        return view('panel-ponente-documentos-acto')->with('acto', $acto);
    }

    public function postDocument(Request $request)
    {
        // Validar el formulario
        $request->validate([
            'documento' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Guardar el documento en storage/app/public/documentos
        $path = $request->file('documento')->store('public/documentos');

        // Puedes guardar la ruta en la base de datos si es necesario
        // Ejemplo: Auth::user()->update(['documento_path' => $path]);

        $acto = $request->query('id');
        return view('panel-ponente-documentos-acto')->with('acto', $acto);
    }

    public function postDia(Request $request) {
        if (null !== $request->query('action')){
            $action = $request->query('action');
            $this->$action($request);
            return $this->getByDia();
        }
    }

    public function postSemana(Request $request) {
        if (null !== $request->query('action')){
            $action = $request->query('action');
            $this->$action($request);
            return $this->getBySemana();
        }
    }
    public function getBySemana() {
        $fechaInicio = Carbon::now();
        $fechaFin = Carbon::now()->addDays(7);
        $idPersona = session('personId');
        $eventos = Acto::GetEventosSemana($idPersona, $fechaInicio->format('Y-m-d'), $fechaFin->format('Y-m-d'));
        $eventosAgrupados = array();

        foreach ($eventos as $evento) {
            $fecha = $evento->Fecha; // Ajusta el formato según tu estructura de fecha

            if (!isset($eventosAgrupados[$fecha])) {
                $eventosAgrupados[$fecha] = array();
            }

            $eventosAgrupados[$fecha][] = $evento;
        }
        // Incrementar la fecha en intervalos diarios
        $intervalo = new DateInterval('P1D'); // P1D representa un intervalo de un día
        $periodo = new DatePeriod($fechaInicio, $intervalo, $fechaFin);
        return view('panel-usuario-semana')->with('eventos', $eventosAgrupados)->with('periodo', $periodo);
    }
    public function getByMes() {
        return view('panel-usuario-mes');
    }

    public function postMes(Request $request) {
        if (null !== $request->query('action')){
            $action = $request->query('action');
            $this->$action($request);
            return $this->selectDay($request);
        }
    }

    private function selectDay(Request $request) {
        $fecha = $request->query('anio')."-".$request->query('mes')."-".$request->query('dia');
        $idPersona = session('personId');
        $actos = Acto::GetEventosDia($idPersona, $fecha);
        return view('panel-usuario-mes')
            ->with('diaSel', $request->query('dia'))
            ->with('eventos', $actos);
    }

    private function suscribe(Request $request) {
        $fecha = $request->query('anio')."-".$request->query('mes')."-".$request->query('dia');
        $idPersona = session('personId');
        Acto::Suscribe($idPersona, $request->input('acto'));
    }

    private function unsuscribe(Request $request) {
        $fecha = $request->query('anio')."-".$request->query('mes')."-".$request->query('dia');
        $idPersona = session('personId');
        Acto::UnSuscribe($idPersona, $request->input('acto'));
    }
}
