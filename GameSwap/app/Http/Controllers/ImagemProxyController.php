<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Response;

class ImagemProxyController extends Controller
{
    public function exibir($id)
    {
        try {
            // Salvar URL base do Google Drive
            $url = "https://drive.google.com/uc?export=download&id={$id}";

            // Cache da imagem para reduzir chamadas excessivas
            $imagem = Cache::remember("imagem_google_drive_$id", 60 * 60, function () use ($url) {
                $res = Http::withHeaders([
                    'Accept' => 'image/*',
                    'User-Agent' => 'Laravel-Http-Client'
                ])->get($url);

                if ($res->successful()) {
                    return $res->body(); // Retorna o binário da imagem
                }

                return null; // Retorna nulo se a requisição falhar
            });

            // Verificar se a imagem foi carregada
            if ($imagem) {
                return response($imagem, 200)->header('Content-Type', 'image/jpeg');
            }

            // Retornar placeholder se a imagem não for encontrada
            return redirect('/placeholder.svg');
        } catch (\Exception $e) {
            // Logar o erro e redirecionar para o placeholder
            \Log::error("Erro ao carregar imagem do Google Drive: {$e->getMessage()}");
            return redirect('/placeholder.svg');
        }
    }
}
