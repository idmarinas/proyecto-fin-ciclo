<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 21:00
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ServiceStatus.php
 * @date    03/03/2026
 * @time    00:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\App;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent]
final class ServiceStatus
{
    /**
     * Intervalo en segundos en que el estado puede cambiar.
     * Todos los usuarios ven el mismo estado dentro de cada ventana.
     */
    private const int INTERVAL = 900; // 15 minutos

    private const array SERVICES = [
        [
            'name' => 'API',
            'icon' => 'tabler:api',
        ],
        [
            'name' => 'Panel de control',
            'icon' => 'tabler:layout-dashboard',
        ],
        [
            'name' => 'Facturación',
            'icon' => 'tabler:receipt',
        ],
        [
            'name' => 'Integraciones',
            'icon' => 'tabler:plug-connected',
        ],
        [
            'name' => 'Notificaciones',
            'icon' => 'tabler:bell',
        ],
    ];

    /**
     * Estados posibles con sus pesos de probabilidad.
     * La suma de pesos da el espacio total; cuanto mayor el peso, más probable.
     *
     * @var array<array{status: string, label: string, color: string, icon: string, weight: int}>
     */
    private const array STATUSES = [
        [
            'status' => 'operational',
            'label'  => 'Operativo',
            'color'  => 'text-green-600',
            'icon'   => 'tabler:circle-check-filled',
            'weight' => 70, // 70 % de probabilidad
        ],
        [
            'status' => 'degraded',
            'label'  => 'Degradado',
            'color'  => 'text-yellow-500',
            'icon'   => 'tabler:alert-circle',
            'weight' => 15,
        ],
        [
            'status' => 'maintenance',
            'label'  => 'Mantenimiento',
            'color'  => 'text-blue-500',
            'icon'   => 'tabler:tools',
            'weight' => 10,
        ],
        [
            'status' => 'incident',
            'label'  => 'Incidencia',
            'color'  => 'text-red-600',
            'icon'   => 'tabler:alert-triangle',
            'weight' => 5,
        ],
    ];

    /**
     * Devuelve la lista de servicios con su estado simulado.
     * Determinista dentro de cada ventana de INTERVAL segundos:
     * todos los usuarios ven exactamente el mismo resultado.
     *
     * @return array<array{name: string, icon: string, status: string, label: string, color: string, statusIcon: string}>
     */
    #[ExposeInTemplate('services')]
    public function getServices(): array
    {
        // Semilla que cambia cada INTERVAL segundos, igual para todos los usuarios
        $seed = (int)floor(time() / self::INTERVAL);

        $totalWeight = array_sum(array_column(self::STATUSES, 'weight'));

        return array_map(function (array $service, int $index) use ($seed, $totalWeight): array {
            // Cada servicio usa un offset distinto para no tener todos el mismo estado
            $hash = abs(crc32($seed.':'.$index));
            $pick = $hash % $totalWeight;

            $chosen = self::STATUSES[0];
            $threshold = 0;
            foreach (self::STATUSES as $candidate) {
                $threshold += $candidate['weight'];
                if ($pick < $threshold) {
                    $chosen = $candidate;
                    break;
                }
            }

            return [
                'name'       => $service['name'],
                'icon'       => $service['icon'],
                'status'     => $chosen['status'],
                'label'      => $chosen['label'],
                'color'      => $chosen['color'],
                'statusIcon' => $chosen['icon'],
            ];
        }, self::SERVICES, array_keys(self::SERVICES));
    }

    /**
     * Estado global resumido: el peor estado de todos los servicios.
     *
     * @return array{label: string, color: string, icon: string}
     */
    #[ExposeInTemplate('global_status')]
    public function getGlobalStatus(): array
    {
        $priority = ['incident' => 3, 'maintenance' => 2, 'degraded' => 1, 'operational' => 0];
        $services = $this->getServices();

        $worst = 'operational';
        foreach ($services as $service) {
            if (($priority[$service['status']] ?? 0) > ($priority[$worst] ?? 0)) {
                $worst = $service['status'];
            }
        }

        return match ($worst) {
            'incident'    => [
                'label' => 'Incidencia activa',
                'color' => 'text-red-600',
                'icon'  => 'tabler:alert-triangle',
            ],
            'maintenance' => [
                'label' => 'Mantenimiento en curso',
                'color' => 'text-blue-500',
                'icon'  => 'tabler:tools',
            ],
            'degraded'    => [
                'label' => 'Servicio degradado',
                'color' => 'text-yellow-500',
                'icon'  => 'tabler:alert-circle',
            ],
            default       => [
                'label' => 'Todos los sistemas OK',
                'color' => 'text-green-600',
                'icon'  => 'tabler:circle-check-filled',
            ],
        };
    }
}
