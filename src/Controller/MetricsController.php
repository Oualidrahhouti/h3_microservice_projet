<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\InMemory;

final class MetricsController extends AbstractController{
    #[Route('/metrics', name: 'app_metrics')]
    public function index(): Response
    {
        // InMemory is for local dev only; consider APCu or Redis in production
        static $registry = null;
        if ($registry === null) {
            $registry = new CollectorRegistry(new InMemory());
        }

        // Example: increment a counter for demonstration
        $counter = $registry->getOrRegisterCounter('app', 'demo_counter', 'Just a demo counter');
        $counter->inc();

        // Render the metrics in Prometheus text format
        $renderer = new RenderTextFormat();
        $metrics = $renderer->render($registry->getMetricFamilySamples());

        return new Response($metrics, 200, ['Content-Type' => RenderTextFormat::MIME_TYPE]);
    }
}
