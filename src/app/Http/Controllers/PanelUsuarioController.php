<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Acto;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;

class PanelUsuarioController extends Controller
{
    public function getByDia() {
        $idPersona = session('personId');
        $actos = Acto::GetEventosDia($idPersona, Carbon::now()->format('Y-m-d'));
        return view('panel-usuario-dia')->with('eventos', $actos);
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

    public function postBajaEvento(Request $request) {
        $acto = $request->input('id');
        $idPersona = session('personId');
        Acto::UnSuscribe($idPersona, $acto);
        return redirect()->back();
    }

    public function postSuscribeEvento(Request $request) {
        $acto = $request->input('id');
        $idPersona = session('personId');
        Acto::Suscribe($idPersona, $acto);
        return redirect()->back();
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
